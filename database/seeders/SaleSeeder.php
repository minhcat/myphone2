<?php

namespace Database\Seeders;

use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->truncate();

        DB::table('sales')->insert([
            [
                'name'              => 'Spring Super Sale Off 2023',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 1000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2023-05-01 00:00:00',
                'end_datetime'      => '2024-05-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Summer Sale Off 2023',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::PERCENT,
                'discount_value'    => 20,
                'discount_minimum'  => 200000,
                'discount_maximum'  => 1000000,
                'start_datetime'    => '2023-05-01 00:00:00',
                'end_datetime'      => '2024-05-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Winter Sale Off 2023',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::PERCENT,
                'discount_value'    => 15,
                'discount_minimum'  => 100000,
                'discount_maximum'  => 500000,
                'start_datetime'    => '2023-11-01 00:00:00',
                'end_datetime'      => '2024-11-30 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Spring Sale Off 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 200000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-01-01 00:00:00',
                'end_datetime'      => '2024-01-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Summer Sale Off 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::INPROGRESS,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 200000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-06-01 00:00:00',
                'end_datetime'      => '2024-07-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Fall Sale Off 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::APPROVED,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 300000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-06-01 00:00:00',
                'end_datetime'      => '2024-07-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Winter Super Sale Off 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::PENDING,
                'author_id'         => 1,
                'discount_type'     => DiscountType::PERCENT,
                'discount_value'    => 25,
                'discount_minimum'  => 500000,
                'discount_maximum'  => 3000000,
                'start_datetime'    => '2024-06-01 00:00:00',
                'end_datetime'      => '2024-07-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('sale_products')->truncate();

        DB::table('sale_products')->insert([
            [
                'target_type'       => 0,
                'target_id'         => 1,
                'sale_id'           => 7,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'target_type'       => 0,
                'target_id'         => 2,
                'sale_id'           => 7,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'target_type'       => 0,
                'target_id'         => 4,
                'sale_id'           => 7,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'target_type'       => 0,
                'target_id'         => 5,
                'sale_id'           => 7,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'target_type'       => 0,
                'target_id'         => 3,
                'sale_id'           => 6,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'target_type'       => 0,
                'target_id'         => 6,
                'sale_id'           => 6,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'target_type'       => 0,
                'target_id'         => 7,
                'sale_id'           => 6,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
        ]);
    }
}
