<?php

namespace Database\Seeders;

use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->truncate();

        DB::table('vouchers')->insert([
            [
                'name'              => 'Spring Voucher 2023',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 1000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2023-01-01 00:00:00',
                'end_datetime'      => '2023-01-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Summer Voucher 2023',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 1000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2023-03-01 00:00:00',
                'end_datetime'      => '2023-03-31 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Fall Voucher 2023',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 1000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2023-06-01 00:00:00',
                'end_datetime'      => '2023-06-30 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Winter Voucher 2023',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 1000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2023-09-01 00:00:00',
                'end_datetime'      => '2023-09-30 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Spring Voucher 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 1000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-01-01 00:00:00',
                'end_datetime'      => '2024-01-30 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Summer Voucher 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::INPROGRESS,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 2000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-03-01 00:00:00',
                'end_datetime'      => '2024-03-30 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Fall Voucher 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::APPROVED,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 3000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-09-01 00:00:00',
                'end_datetime'      => '2024-09-30 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Fall Voucher 2024',
                'description'       => Lorem::paragraph(3),
                'status'            => PromotionStatus::PENDING,
                'author_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 4000000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-09-01 00:00:00',
                'end_datetime'      => '2024-09-30 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('voucher_codes')->truncate();

        DB::table('voucher_codes')->insert([
            [
                'code'              => 'SQW254',
                'voucher_id'        => 7,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'code'              => 'GHE394',
                'voucher_id'        => 7,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'code'              => 'JWR934',
                'voucher_id'        => 7,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'code'              => 'EWR343',
                'voucher_id'        => 8,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'code'              => 'HJH034',
                'voucher_id'        => 8,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'code'              => 'WER343',
                'voucher_id'        => 8,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
            [
                'code'              => 'TYT446',
                'voucher_id'        => 8,
                'discount_type'     => null,
                'discount_value'    => null,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
            ],
        ]);
    }
}
