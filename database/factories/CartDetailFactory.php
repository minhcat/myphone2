<?php

namespace Database\Factories;

use App\Enums\TargetType;
use Database\Fakers\CartDetailFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Cart\Entities\CartDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CartDetailFactory extends Factory
{
    protected $model = CartDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cart_detail = new CartDetailFaker();

        return [
            'cart_id'       => $cart_detail->cart_id,
            'target_type'   => TargetType::PRODUCT,
            'target_id'     => $cart_detail->target_id,
            'author_id'     => $cart_detail->author_id,
            'price'         => $cart_detail->price,
            'quantity'      => rand(1, 3),
        ];
    }
}
