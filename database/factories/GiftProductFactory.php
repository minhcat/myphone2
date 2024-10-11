<?php

namespace Database\Factories;

use Database\Fakers\GiftProductFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gift\Entities\GiftProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GiftProductFactory extends Factory
{
    protected $model = GiftProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gift_product = new GiftProductFaker();

        return [
            'target_type'       => $gift_product->target_type,
            'target_id'         => $gift_product->target_id,
            'gift_id'           => $gift_product->gift_id,
            'author_id'         => $gift_product->author_id,
            'quantity'          => $gift_product->quantity,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
