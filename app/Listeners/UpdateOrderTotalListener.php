<?php

namespace App\Listeners;

use App\Enums\ConditionType;
use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use App\Events\CreateOrderEvent;
use Modules\Order\Repositories\OrderRepository;
use Modules\Promotion\Repositories\PromotionRepository;

class UpdateOrderTotalListener
{
    /** @var \Modules\Order\Repositories\OrderRepository */
    protected $orderRepository;

    /** @var \Modules\Promotion\Repositories\PromotionRepository */
    protected $promotionRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->orderRepository = new OrderRepository;
        $this->promotionRepository = new PromotionRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CreateOrderEvent $event)
    {
        $order = $event->order;
        $subtotal = $order->subtotal_detail;
        $discount_total = 0;

        $promotions = $this->promotionRepository->get([['status', PromotionStatus::INPROGRESS]]);
        foreach ($promotions as $promotion) {
            $check = false;
            if ($promotion->condition_type === ConditionType::QUANTITY) {
                if ($order->quantity >= $promotion->condition_value) {
                    $check = true;
                }
            } else if ($promotion->condition_type === ConditionType::TOTAL) {
                if ($order->subtotal_detail >= $promotion->condition_value) {
                    $check = true;
                }
            }

            $discount = 0;
            if ($check) {
                if ($promotion->discount_target === DiscountTarget::INVOICE) {
                    if ($promotion->discount_type === DiscountType::AMOUNT) {
                        $discount += $promotion->discount_value;
                        $discount = $this->checkDiscountRange($discount, $promotion);
                    } else if ($promotion->discount_type === DiscountType::PERCENT) {
                        $discount += $order->subtotal_detail * ($promotion->discount_value / 100);
                        $discount = $this->checkDiscountRange($discount, $promotion);
                    }
                } else if ($promotion->discount_target === DiscountTarget::TRANSPORT_FEE) {
                    if ($promotion->discount_type === DiscountType::AMOUNT) {
                        $discount += $promotion->discount_value;
                        $discount = $this->checkDiscountRange($discount, $promotion);
                    } else if ($promotion->discount_type === DiscountType::PERCENT) {
                        $discount += $order->subtotal_detail * ($promotion->discount_value / 100);
                        $discount = $this->checkDiscountRange($discount, $promotion);
                    }
                }
            }

            $discount_total += $discount;
        }

        $tax = ($subtotal - $discount_total) * 0.1;
        $this->orderRepository->update($order->id, [
            'subtotal'      => $subtotal,
            'transport_fee' => 0,
            'discount'      => $discount_total,
            'tax'           => $tax,
            'total'         => $subtotal - $discount_total + $tax
        ]);
    }

    private function checkDiscountRange($discount, $promotion)
    {
        if ($promotion->discount_minimum !== null) {
            $discount = $discount < $promotion->discount_minimum ? $promotion->discount_minimum : $discount;
        }
        if ($promotion->discount_maximum !== null) {
            $discount = $discount > $promotion->discount_maximum ? $promotion->discount_maximum : $discount;
        }

        return $discount;
    }
}
