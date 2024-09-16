<?php

namespace Database\Factories;

use Database\Fakers\VariationFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Variation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VariationFactory extends Factory
{
    protected $model = Variation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $variation = new VariationFaker();

        return [
            'code'          => $variation->code,
            'product_id'    => $variation->product_id,
            'price'         => $variation->price,
            'author_id'     => $variation->author_id,
            'description'   => Lorem::paragraph(3),
        ];
    }
}
