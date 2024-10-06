<?php

namespace Database\Factories;

use Database\Fakers\InvoiceFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Invoice\Entities\Invoice;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $invoice = new InvoiceFaker();

        return [
            'code'                  => $invoice->code,
            'author_id'             => $invoice->author_id,
            'address_id'            => $invoice->address_id,
            'transporter_case_id'   => $invoice->transporter_case_id,
            'subtotal'              => 0,
            'transport_fee'         => 0,
            'discount'              => 0,
            'tax'                   => 0,
            'total'                 => 0,
            'created_at'            => now()->format('Y-m-d H:i:s'),
            'updated_at'            => now()->format('Y-m-d H:i:s'),
        ];
    }
}
