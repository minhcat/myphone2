<?php

namespace Database\Factories;

use Database\Fakers\SaleProductFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Sale\Entities\SaleProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SaleProductFactory extends Factory
{
    protected $model = SaleProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sale_product = new SaleProductFaker();

        return [
            'target_type'       => $sale_product->target_type,
            'target_id'         => $sale_product->target_id,
            'sale_id'           => $sale_product->sale_id,
            'author_id'         => $sale_product->author_id,
            'discount_type'     => $sale_product->discount_type,
            'discount_value'    => $sale_product->discount_value,
            'discount_minimum'  => $sale_product->discount_minimum,
            'discount_maximum'  => $sale_product->discount_maximum,
        ];
    }
}
