<?php

namespace App\Listeners;

use App\Enums\ConditionType;
use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use App\Enums\TargetType;
use App\Events\CreateOrderEvent;
use Modules\Gift\Repositories\GiftProductItemRepository;
use Modules\Gift\Repositories\GiftProductRepository;
use Modules\Gift\Repositories\GiftRepository;
use Modules\Order\Repositories\OrderDetailRepository;
use Modules\Order\Repositories\OrderRepository;
use Modules\Promotion\Repositories\PromotionRepository;
use Modules\Sale\Repositories\SaleRepository;
use Modules\Voucher\Repositories\VoucherCodeRepository;
use Modules\Voucher\Repositories\VoucherRepository;

class UpdateOrderTotalListener
{
    /** @var \Modules\Order\Repositories\OrderRepository */
    protected $orderRepository;

    /** @var \Modules\Order\Repositories\OrderDetailRepository */
    protected $orderDetailRepository;

    /** @var \Modules\Promotion\Repositories\PromotionRepository */
    protected $promotionRepository;

    /** @var \Modules\Sale\Repositories\SaleRepository */
    protected $saleRepository;

    /** @var \Modules\Voucher\Repositories\VoucherRepository */
    protected $voucherRepository;

    /** @var \Modules\Voucher\Repositories\VoucherCodeRepository */
    protected $voucherCodeRepository;

    /** @var \Modules\Gift\Repositories\GiftRepository */
    protected $giftRepository;

    /** @var \Modules\Gift\Repositories\GiftProductRepository */
    protected $giftProductRepository;

    /** @var \Modules\Gift\Repositories\GiftProductItemRepository */
    protected $giftProductItemRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->orderRepository = new OrderRepository;
        $this->orderDetailRepository = new OrderDetailRepository;
        $this->promotionRepository = new PromotionRepository;
        $this->saleRepository = new SaleRepository;
        $this->voucherRepository = new VoucherRepository;
        $this->voucherCodeRepository = new VoucherCodeRepository;
        $this->giftRepository = new GiftRepository;
        $this->giftProductRepository = new GiftProductRepository;
        $this->giftProductItemRepository = new GiftProductItemRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CreateOrderEvent $event)
    {
        $this->handlePromotion($event);
        $this->handleSaleOff($event);
        $this->handleVoucher($event);
        $this->handleGift($event);
    }

    private function handlePromotion($event)
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
                        $discount = $this->checkDiscountRange($discount, $promotion->discount_minimum, $promotion->discount_maximum);
                    } else if ($promotion->discount_type === DiscountType::PERCENT) {
                        $discount += $order->subtotal_detail * ($promotion->discount_value / 100);
                        $discount = $this->checkDiscountRange($discount, $promotion->discount_minimum, $promotion->discount_maximum);
                    }
                } else if ($promotion->discount_target === DiscountTarget::TRANSPORT_FEE) {
                    if ($promotion->discount_type === DiscountType::AMOUNT) {
                        $discount += $promotion->discount_value;
                        $discount = $this->checkDiscountRange($discount, $promotion->discount_minimum, $promotion->discount_maximum);
                    } else if ($promotion->discount_type === DiscountType::PERCENT) {
                        $discount += $order->subtotal_detail * ($promotion->discount_value / 100);
                        $discount = $this->checkDiscountRange($discount, $promotion->discount_minimum, $promotion->discount_maximum);
                    }
                }
            }

            $discount_total += $discount;
        }

        // $tax = ($subtotal - $discount_total) * 0.1;
        $tax = 0;
        $this->orderRepository->update($order->id, [
            'subtotal'      => $subtotal,
            'transport_fee' => 0,
            'discount'      => $discount_total,
            'tax'           => $tax,
            'total'         => $subtotal - $discount_total + $tax
        ]);
    }

    private function handleSaleOff($event)
    {
        $order = $event->order;
        $discount_total = 0;

        $sales = $this->saleRepository->get([['status', PromotionStatus::INPROGRESS]]);
        foreach ($sales as $sale) {
            $sale_products = $sale->saleproducts;
            foreach ($sale_products as $sale_product) {
                $order_details = $order->details;
                foreach ($order_details as $detail) {
                    if ($detail->target_id === $sale_product->target_id && $sale_product->target_type === $detail->target_type) {
                        $discount = 0;
                        $discount_type = $sale_product->discount_type === null ? $sale->discount_type : $sale_product->discount_type;
                        $discount_value = $sale_product->discount_value === null ? $sale->discount_value : $sale_product->discount_value;
                        $discount_minimum = $sale_product->discount_minimum === null ? $sale->discount_minimum : $sale_product->discount_minimum;
                        $discount_maximum = $sale_product->discount_maximum === null ? $sale->discount_maximum : $sale_product->discount_maximum;
                        if ($discount_type === DiscountType::AMOUNT) {
                            $discount = $discount_value;
                            $discount = $this->checkDiscountRange($discount, $discount_minimum, $discount_maximum);
                        } elseif ($discount_type === DiscountType::PERCENT) {
                            $discount = $detail->price * $discount_value / 100;
                            $discount = $this->checkDiscountRange($discount, $discount_minimum, $discount_maximum);
                        }
                        $discount_total += $discount;
                    }
                }
            }
        }

        $order = $this->orderRepository->find($order->id);
        $this->orderRepository->update($order->id, [
            'discount'      => $order->discount + $discount_total,
            'total'         => $order->total - $discount_total
        ]);
    }

    public function handleVoucher($event)
    {
        $order = $event->order;
        $discount_total = 0;

        $vouchers = $this->voucherRepository->get([['status', PromotionStatus::INPROGRESS]]);
        foreach ($vouchers as $voucher) {
            $voucher_codes = $voucher->codes;
            foreach ($voucher_codes as $code) {
                if ($order->voucher_code === $code->code && $code->quantity !== 0) {
                    $discount = 0;
                    $discount_type = $code->discount_type === null ? $voucher->discount_type : $code->discount_type;
                    $discount_value = $code->discount_value === null ? $voucher->discount_value : $code->discount_value;
                    $discount_minimum = $code->discount_minimum === null ? $voucher->discount_minimum : $code->discount_minimum;
                    $discount_maximum = $code->discount_maximum === null ? $voucher->discount_maximum : $code->discount_maximum;
                    if ($discount_type === DiscountType::AMOUNT) {
                        $discount = $discount_value;
                        $discount = $this->checkDiscountRange($discount, $discount_minimum, $discount_maximum);
                    } elseif ($discount_type === DiscountType::PERCENT) {
                        $discount = $order->subtotal * $discount_value / 100;
                        $discount = $this->checkDiscountRange($discount, $discount_minimum, $discount_maximum);
                    }
                    $quantity = $code->quantity;
                    if ($quantity !== null) {
                        $this->voucherCodeRepository->update($code->id, [
                            'quantity' => $quantity - 1,
                        ]);
                    }
                    $discount_total += $discount;
                }
            }
        }

        $order = $this->orderRepository->find($order->id);
        $this->orderRepository->update($order->id, [
            'discount'      => $order->discount + $discount_total,
            'total'         => $order->total - $discount_total
        ]);
    }

    public function handleGift($event)
    {
        $order = $event->order;
        $gifts = $this->giftRepository->get([['status', PromotionStatus::INPROGRESS]]);
        $gifts_include = [];

        foreach ($gifts as $gift) {
            $gift_products = $this->giftProductRepository->get([['gift_id', $gift->id]]);
            foreach ($gift_products as $gift_product) {
                $order_details = $order->details;
                foreach ($order_details as $order_detail) {
                    if ($order_detail->target_id === $gift_product->target_id 
                    && $order_detail->target_type === $gift_product->target_type
                    && ($gift_product->quantity === null || $gift_product->quantity > 0)) {
                        $gifts_include[] = $this->giftProductItemRepository->get([['gift_product_id', $gift_product->id]]);
                        if ($gift_product->quantity !== null) {
                            $this->giftProductRepository->update($gift_product->id, [
                                'quantity' => $gift_product->quantity - 1,
                            ]);
                        }
                    }
                }
            }
        }

        foreach ($gifts_include as $gifts) {
            foreach ($gifts as $gift) {
                $this->orderDetailRepository->create([
                    'order_id'          => $order->id,
                    'target_type'       => $gift->target_type,
                    'target_id'         => $gift->target_id,
                    'price'             => 0,
                    'quantity'          => $gift->quantity
                ]);
            }
        }
    }

    private function checkDiscountRange($discount, $discount_minimum, $discount_maximum)
    {
        if ($discount_minimum !== null) {
            $discount = max($discount, $discount_minimum);
        }
        if ($discount_maximum !== null) {
            $discount = min($discount, $discount_maximum);
        }

        return $discount;
    }
}
