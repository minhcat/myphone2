<?php

namespace Database\Factories;

use Database\Fakers\PromotionFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Promotion\Entities\Promotion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PromotionFactory extends Factory
{
    protected $model = Promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $promotion = new PromotionFaker();

        return [
            'name'              => $promotion->name,
            'description'       => Lorem::paragraph(3),
            'author_id'         => $promotion->author_id,
            'status'            => $promotion->status,
            'condition_type'    => $promotion->condition_type,
            'condition_value'   => $promotion->condition_value,
            'discount_target'   => $promotion->discount_target,
            'discount_type'     => $promotion->discount_type,
            'discount_value'    => $promotion->discount_value,
            'discount_minimum'  => $promotion->discount_minimum,
            'discount_maximum'  => $promotion->discount_maximum,
            'start_datetime'    => $promotion->start_datetime,
            'end_datetime'      => $promotion->end_datetime,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
