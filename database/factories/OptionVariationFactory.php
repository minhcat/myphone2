<?php

namespace Database\Factories;

use Database\Fakers\OptionVariationFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\OptionVariation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OptionVariationFactory extends Factory
{
    protected $model = OptionVariation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $option_variation = new OptionVariationFaker;

        return [
            'variation_id'  => $option_variation->variation_id,
            'option_id'     => $option_variation->option_id
        ];
    }
}
