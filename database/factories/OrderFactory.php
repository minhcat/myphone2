<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use Database\Fakers\OrderFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Entities\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $order = new OrderFaker();

        return [
            'code'                  => $order->code,
            'author_id'             => $order->author_id,
            'address_id'            => $order->address_id,
            'transporter_case_id'   => $order->transporter_case_id,
            'voucher_code'          => null,
            'status'                => OrderStatus::PENDING,
            'subtotal'              => 0,
            'transport_fee'         => 0,
            'discount'              => 0,
            'tax'                   => 0,
            'total'                 => 0,
            'note'                  => Lorem::paragraph(1),
            'created_at'            => now()->format('Y-m-d H:i:s'),
            'updated_at'            => now()->format('Y-m-d H:i:s'),
        ];
    }
}
