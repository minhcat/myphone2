<?php

namespace App\Observers;

use App\Enums\OrderStatus;
use Modules\Invoice\Entities\Invoice;
use Modules\Invoice\Repositories\InvoiceDetailRepository;
use Modules\Invoice\Repositories\InvoiceRepository;
use Modules\Order\Entities\Order;

class OrderObserver
{
    /** @var \Modules\Invoice\Repositories\InvoiceRepository */
    protected $invoiceRepository;

    /** @var \Modules\Invoice\Repositories\InvoiceDetailRepository */
    protected $invoiceDetailRepository;

    /**
     * Create User Observer instance.
    */
    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository;
        $this->invoiceDetailRepository = new InvoiceDetailRepository;
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \Modules\User\Entities\User  $user
     * @return void
     */
    public function updated(Order $order)
    {
        if ($order->status == OrderStatus::COMPLETED) {
            $code = generate_code(new Invoice());

            $invoice = $this->invoiceRepository->create([
                'code'          => '#'.$code,
                'author_id'     => $order->author_id,
                'address_id'    => $order->address_id,
                'subtotal'      => $order->subtotal,
                'transport_fee' => $order->transport_fee,
                'discount'      => $order->discount,
                'tax'           => $order->tax,
                'total'         => $order->total,
                'note'          => $order->note,
            ]);

            $details = $order->details;

            foreach ($details as $detail) {
                $this->invoiceDetailRepository->create([
                    'invoice_id'    => $invoice->id,
                    'author_id'     => $invoice->author_id,
                    'target_type'   => $detail->target_type,
                    'target_id'     => $detail->target_id,
                    'price'         => $detail->price,
                    'quantity'      => $detail->quantity,
                ]);
            }
        }
    }
}
