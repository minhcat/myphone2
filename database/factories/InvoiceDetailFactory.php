<?php

namespace Database\Factories;

use App\Enums\TargetType;
use Database\Fakers\InvoiceDetailFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Invoice\Entities\InvoiceDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvoiceDetailFactory extends Factory
{
    protected $model = InvoiceDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $invoice_detail = new InvoiceDetailFaker();

        return [
            'invoice_id'    => $invoice_detail->invoice_id,
            'author_id'     => $invoice_detail->author_id,
            'target_id'     => $invoice_detail->target_id,
            'target_type'   => TargetType::PRODUCT,
            'price'         => $invoice_detail->price,
            'quantity'      => rand(1, 3)
        ];
    }
}
