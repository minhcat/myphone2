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
                'user_id'       => $order->user_id,
                'address_id'    => $order->address_id,
                'total'         => $order->total,
                'note'          => $order->note,
            ]);

            $details = $order->details;

            foreach ($details as $detail) {
                $this->invoiceDetailRepository->create([
                    'invoice_id'    => $invoice->id,
                    'product_id'    => $detail->product_id,
                    'price'         => $detail->price,
                    'quantity'      => $detail->quantity,
                ]);
            }
        }
    }
}
