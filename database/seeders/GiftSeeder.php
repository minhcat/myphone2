<?php

namespace Database\Seeders;

use App\Enums\PromotionStatus;
use App\Enums\TargetType;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gifts')->truncate();

        DB::table('gifts')->insert([
            [
                'name'              => 'List Product with Gifts 1',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'start_datetime'    => '2023-05-01 00:00:00',
                'end_datetime'      => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'              => 'List Product with Gifts 2',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'start_datetime'    => '2023-05-01 00:00:00',
                'end_datetime'      => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'              => 'List Product with Gifts 3',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::INPROGRESS,
                'author_id'         => 1,
                'start_datetime'    => '2023-05-01 00:00:00',
                'end_datetime'      => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'              => 'List Product with Gifts 4',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::APPROVED,
                'author_id'         => 1,
                'start_datetime'    => '2023-05-01 00:00:00',
                'end_datetime'      => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'              => 'List Product with Gifts 5',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::PENDING,
                'author_id'         => 1,
                'start_datetime'    => '2023-05-01 00:00:00',
                'end_datetime'      => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s')
            ],
        ]);

        DB::table('gift_products')->truncate();

        DB::table('gift_products')->insert([
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 1,
                'gift_id'           => 3,
                'author_id'         => 1,
                'quantity'          => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 2,
                'gift_id'           => 3,
                'author_id'         => 1,
                'quantity'          => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 3,
                'gift_id'           => 3,
                'author_id'         => 1,
                'quantity'          => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('gift_product_items')->truncate();

        DB::table('gift_product_items')->insert([
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 31,
                'gift_product_id'   => 1,
                'author_id'         => 1,
                'quantity'          => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 33,
                'gift_product_id'   => 1,
                'author_id'         => 1,
                'quantity'          => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 32,
                'gift_product_id'   => 2,
                'author_id'         => 1,
                'quantity'          => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 34,
                'gift_product_id'   => 2,
                'author_id'         => 1,
                'quantity'          => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 32,
                'gift_product_id'   => 3,
                'author_id'         => 1,
                'quantity'          => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'target_type'       => TargetType::PRODUCT,
                'target_id'         => 34,
                'gift_product_id'   => 3,
                'author_id'         => 1,
                'quantity'          => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
