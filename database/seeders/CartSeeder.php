<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->truncate();

        DB::table('carts')->insert([
            [
                'code'          => '#5489',
                'user_id'       => 1,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#8743',
                'user_id'       => 2,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#7962',
                'user_id'       => 3,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#2725',
                'user_id'       => 4,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#4850',
                'user_id'       => 5,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('cart_details')->truncate();

        DB::table('cart_details')->insert([
            // 1
            [
                'cart_id'       => 1,
                'product_id'    => 1,
                'price'         => 45000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 1,
                'product_id'    => 2,
                'price'         => 42000000,
                'quantity'      => 2,
            ],
            [
                'cart_id'       => 1,
                'product_id'    => 3,
                'price'         => 36000000,
                'quantity'      => 2,
            ],
            // 2
            [
                'cart_id'       => 2,
                'product_id'    => 4,
                'price'         => 32000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 2,
                'product_id'    => 5,
                'price'         => 8000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 2,
                'product_id'    => 6,
                'price'         => 7000000,
                'quantity'      => 1,
            ],
            // 3
            [
                'cart_id'       => 3,
                'product_id'    => 7,
                'price'         => 6000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 3,
                'product_id'    => 8,
                'price'         => 5000000,
                'quantity'      => 1,
            ],
            // 4
            [
                'cart_id'       => 4,
                'product_id'    => 9,
                'price'         => 20000000,
                'quantity'      => 2,
            ],
            [
                'cart_id'       => 4,
                'product_id'    => 10,
                'price'         => 2000000,
                'quantity'      => 1,
            ],
            // 5
            [
                'cart_id'       => 5,
                'product_id'    => 11,
                'price'         => 35000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 5,
                'product_id'    => 12,
                'price'         => 32000000,
                'quantity'      => 2,
            ],
        ]);
    }
}
