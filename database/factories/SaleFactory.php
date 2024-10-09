<?php

namespace Database\Factories;

use Database\Fakers\SaleFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Sale\Entities\Sale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SaleFactory extends Factory
{
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sale = new SaleFaker();

        return [
            'name'              => $sale->name,
            'author_id'         => $sale->author_id,
            'description'       => Lorem::paragraph(3),
            'status'            => $sale->status,
            'discount_type'     => $sale->discount_type,
            'discount_value'    => $sale->discount_value,
            'discount_minimum'  => $sale->discount_minimum,
            'discount_maximum'  => $sale->discount_maximum,
            'start_datetime'    => $sale->start_datetime,
            'end_datetime'      => $sale->end_datetime,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
