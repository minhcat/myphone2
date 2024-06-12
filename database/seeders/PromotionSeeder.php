<?php

namespace Database\Seeders;

use App\Enums\ConditionType;
use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->truncate();

        DB::table('promotions')->insert([
            [
                'name'              => 'Spring Sale',
                'description'       => 'spring sale',
                'status'            => PromotionStatus::END,
                'author_id'         => 1,
                'condition_type'    => ConditionType::QUANTITY,
                'condition_value'   => 3,
                'discount_target'   => DiscountTarget::INVOICE,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 200000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-01-24 00:00:00',
                'end_datetime'      => '2024-04-24 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Fall Sale',
                'description'       => 'fall sale',
                'status'            => PromotionStatus::INPROGRESS,
                'author_id'         => 1,
                'condition_type'    => ConditionType::TOTAL,
                'condition_value'   => 3000000,
                'discount_target'   => DiscountTarget::INVOICE,
                'discount_type'     => DiscountType::PERCENT,
                'discount_value'    => 20,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-05-24 12:00:00',
                'end_datetime'      => '2024-08-24 12:00:00',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Summer Super Sale',
                'description'       => 'summer super sale',
                'status'            => PromotionStatus::PENDING,
                'author_id'         => 1,
                'condition_type'    => ConditionType::QUANTITY,
                'condition_value'   => 3,
                'discount_target'   => DiscountTarget::INVOICE,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 200000,
                'discount_minimum'  => null,
                'discount_maximum'  => null,
                'start_datetime'    => '2024-05-24 12:00:00',
                'end_datetime'      => '2024-08-24 12:00:00',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Black Friday 2024',
                'description'       => 'black friday 2024',
                'status'            => PromotionStatus::APPROVED,
                'author_id'         => 1,
                'condition_type'    => ConditionType::TOTAL,
                'condition_value'   => 3000000,
                'discount_target'   => DiscountTarget::INVOICE,
                'discount_type'     => DiscountType::PERCENT,
                'discount_value'    => 35,
                'discount_minimum'  => 500000,
                'discount_maximum'  => 100000,
                'start_datetime'    => '2024-05-24 12:00:00',
                'end_datetime'      => '2024-08-24 12:00:00',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Commany Anniversary 2024',
                'description'       => 'commany anniversary 24/5/2024',
                'status'            => PromotionStatus::APPROVED,
                'author_id'         => 1,
                'condition_type'    => ConditionType::QUANTITY,
                'condition_value'   => 4,
                'discount_target'   => DiscountTarget::INVOICE,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 200000,
                'discount_minimum'  => 300000,
                'discount_maximum'  => 100000,
                'start_datetime'    => '2024-05-24 00:00:00',
                'end_datetime'      => '2024-05-24 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
