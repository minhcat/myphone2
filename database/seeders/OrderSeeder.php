<?php

namespace Database\Seeders;

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
                'code'          => '#1234',
                'user_id'       => 1,
                'address_id'    => 1,
                'status'        => 1,
                'note'          => 'note',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#2345',
                'user_id'       => 2,
                'address_id'    => 3,
                'status'        => 2,
                'note'          => 'note',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#3456',
                'user_id'       => 3,
                'address_id'    => 5,
                'status'        => 3,
                'note'          => 'note',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#4567',
                'user_id'       => 4,
                'address_id'    => 7,
                'status'        => 4,
                'note'          => 'note',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#5678',
                'user_id'       => 5,
                'address_id'    => 9,
                'status'        => 5,
                'note'          => 'note',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('order_details')->truncate();

        DB::table('order_details')->insert([
            // order 1
            [
                'order_id'      => 1,
                'product_id'    => 1,
                'price'         => 45000000,
                'quantity'      => 1,
            ],
            [
                'order_id'      => 1,
                'product_id'    => 2,
                'price'         => 42000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 1,
                'product_id'    => 3,
                'price'         => 36000000,
                'quantity'      => 1,
            ],
            // order 2
            [
                'order_id'      => 2,
                'product_id'    => 4,
                'price'         => 32000000,
                'quantity'      => 1,
            ],
            [
                'order_id'      => 2,
                'product_id'    => 5,
                'price'         => 8000000,
                'quantity'      => 1,
            ],
            [
                'order_id'      => 2,
                'product_id'    => 6,
                'price'         => 7000000,
                'quantity'      => 1,
            ],
            // order 3
            [
                'order_id'      => 3,
                'product_id'    => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 3,
                'product_id'    => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 3,
                'product_id'    => 9,
                'price'         => 20000000,
                'quantity'      => 2,
            ],
            // order 4
            [
                'order_id'      => 4,
                'product_id'    => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 4,
                'product_id'    => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            // order 5
            [
                'order_id'      => 5,
                'product_id'    => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'order_id'      => 5,
                'product_id'    => 8,
                'price'         => 5000000,
                'quantity'      => 1,
            ],
        ]);
    }
}
