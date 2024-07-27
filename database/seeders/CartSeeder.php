<?php

namespace Database\Seeders;

use App\Enums\TargetType;
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
                'author_id'     => 1,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#8743',
                'author_id'     => 2,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#7962',
                'author_id'     => 3,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#2725',
                'author_id'     => 4,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#4850',
                'author_id'     => 5,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#5141',
                'author_id'     => 6,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#6971',
                'author_id'     => 7,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#8458',
                'author_id'     => 8,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#3061',
                'author_id'     => 9,
                'note'          => '',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#9724',
                'author_id'     => 10,
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
                'target_type'   => TargetType::PRODUCT,
                'target_id'    => 1,
                'price'         => 45000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'    => 2,
                'price'         => 42000000,
                'quantity'      => 2,
            ],
            [
                'cart_id'       => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'    => 3,
                'price'         => 36000000,
                'quantity'      => 2,
            ],
            // 2
            [
                'cart_id'       => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'    => 4,
                'price'         => 32000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 5,
                'price'         => 8000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 6,
                'price'         => 7000000,
                'quantity'      => 1,
            ],
            // 3
            [
                'cart_id'       => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 7,
                'price'         => 6000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 8,
                'price'         => 5000000,
                'quantity'      => 1,
            ],
            // 4
            [
                'cart_id'       => 4,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 9,
                'price'         => 20000000,
                'quantity'      => 2,
            ],
            [
                'cart_id'       => 4,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 10,
                'price'         => 2000000,
                'quantity'      => 1,
            ],
            // 5
            [
                'cart_id'       => 5,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 11,
                'price'         => 35000000,
                'quantity'      => 1,
            ],
            [
                'cart_id'       => 5,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 12,
                'price'         => 32000000,
                'quantity'      => 2,
            ],
        ]);
    }
}
