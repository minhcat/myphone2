<?php

namespace Database\Factories;

use App\Enums\TargetType;
use Database\Fakers\OrderDetailFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Entities\OrderDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $order_detail = new OrderDetailFaker();

        return [
            'order_id'      => $order_detail->order_id,
            'author_id'     => $order_detail->author_id,
            'target_type'   => TargetType::PRODUCT,
            'target_id'     => $order_detail->target_id,
            'price'         => $order_detail->price,
            'quantity'      => rand(1, 3),
        ];
    }
}
