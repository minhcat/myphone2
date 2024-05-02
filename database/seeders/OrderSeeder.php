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
                'is_pending'    => true,
                'is_approved'   => false,
                'is_shipping'   => false,
                'is_completed'  => false,
                'note'          => 'note'
            ],
            [
                'code'          => '#2345',
                'user_id'       => 2,
                'address_id'    => 3,
                'is_pending'    => false,
                'is_approved'   => true,
                'is_shipping'   => false,
                'is_completed'  => false,
                'note'          => 'note'
            ],
            [
                'code'          => '#3456',
                'user_id'       => 3,
                'address_id'    => 5,
                'is_pending'    => false,
                'is_approved'   => false,
                'is_shipping'   => true,
                'is_completed'  => false,
                'note'          => 'note'
            ],
            [
                'code'          => '#4567',
                'user_id'       => 4,
                'address_id'    => 7,
                'is_pending'    => false,
                'is_approved'   => false,
                'is_shipping'   => false,
                'is_completed'  => true,
                'note'          => 'note'
            ],
            [
                'code'          => '#5678',
                'user_id'       => 5,
                'address_id'    => 9,
                'is_pending'    => false,
                'is_approved'   => false,
                'is_shipping'   => false,
                'is_completed'  => false,
                'note'          => 'note'
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
