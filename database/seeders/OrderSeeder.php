<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Enums\TargetType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->truncate();

        DB::table('orders')->insert([
            [
                'code'                  => '#1234',
                'author_id'             => 1,
                'address_id'            => 1,
                'transporter_case_id'   => 1,
                'status'                => OrderStatus::COMPLETED,
                'note'                  => 'note',
                'subtotal'              => 165000000,
                'transport_fee'         => 20000,
                'discount'              => 500000,
                'tax'                   => 16450000,
                'total'                 => 180970000,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#2345',
                'author_id'             => 2,
                'address_id'            => 3,
                'transporter_case_id'   => 1,
                'status'                => OrderStatus::CANCELLED,
                'note'                  => 'note',
                'subtotal'              => 47000000,
                'transport_fee'         => 20000,
                'discount'              => 300000,
                'tax'                   => 4670000,
                'total'                 => 51390000,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#3456',
                'author_id'             => 3,
                'address_id'            => 5,
                'transporter_case_id'   => 1,
                'status'                => OrderStatus::SHIPPING,
                'note'                  => 'note',
                'subtotal'              => 62000000,
                'transport_fee'         => 30000,
                'discount'              => 400000,
                'tax'                   => 6160000,
                'total'                 => 68190000,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#4567',
                'author_id'             => 4,
                'address_id'            => 7,
                'transporter_case_id'   => 1,
                'status'                => OrderStatus::APPROVED,
                'note'                  => 'note',
                'subtotal'              => 22000000,
                'transport_fee'         => 30000,
                'discount'              => 600000,
                'tax'                   => 2140000,
                'total'                 => 23570000,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#5678',
                'author_id'             => 5,
                'address_id'            => 9,
                'transporter_case_id'   => 1,
                'status'                => OrderStatus::PENDING,
                'note'                  => 'note',
                'subtotal'              => 17000000,
                'transport_fee'         => 30000,
                'discount'              => 800000,
                'tax'                   => 1620000,
                'total'                 => 17850000,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('order_details')->truncate();

        DB::table('order_details')->insert([
            // order 1
            [
                'order_id'      => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 1,
                'price'         => 45000000,
                'quantity'      => 1,
            ],
            [
                'order_id'      => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 2,
                'price'         => 42000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 3,
                'price'         => 36000000,
                'quantity'      => 1,
            ],
            // order 2
            [
                'order_id'      => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 4,
                'price'         => 32000000,
                'quantity'      => 1,
            ],
            [
                'order_id'      => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 5,
                'price'         => 8000000,
                'quantity'      => 1,
            ],
            [
                'order_id'      => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 6,
                'price'         => 7000000,
                'quantity'      => 1,
            ],
            // order 3
            [
                'order_id'      => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 9,
                'price'         => 20000000,
                'quantity'      => 2,
            ],
            // order 4
            [
                'order_id'      => 4,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 4,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            // order 5
            [
                'order_id'      => 5,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 5,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 8,
                'price'         => 5000000,
                'quantity'      => 1,
            ],
        ]);
    }
}
