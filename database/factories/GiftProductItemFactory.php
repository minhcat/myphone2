<?php

namespace Database\Factories;

use Database\Fakers\GiftProductItemFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gift\Entities\GiftProductItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GiftProductItemFactory extends Factory
{
    protected $model = GiftProductItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gift_product_item = new GiftProductItemFaker();

        return [
            'target_type'       => $gift_product_item->target_type,
            'target_id'         => $gift_product_item->target_id,
            'gift_product_id'   => $gift_product_item->gift_product_id,
            'author_id'         => $gift_product_item->author_id,
            'quantity'          => $gift_product_item->quantity,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
