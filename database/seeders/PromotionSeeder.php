<?php

namespace Database\Seeders;

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
                'condition_id'      => 1,
                'discount_form_id'  => 1,
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
                'condition_id'      => 1,
                'discount_form_id'  => 1,
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
                'condition_id'      => 1,
                'discount_form_id'  => 1,
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
                'condition_id'      => 1,
                'discount_form_id'  => 2,
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
                'condition_id'      => 1,
                'discount_form_id'  => 2,
                'start_datetime'    => '2024-05-24 00:00:00',
                'end_datetime'      => '2024-05-24 23:59:59',
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('conditions')->truncate();

        DB::table('conditions')->insert([
            [
                'name'              => 'Invoice Total',
                'description'       => 'invoice total price is more than 300k',
                'author_id'         => 1,
                'value'             => 300000,
                'handler'           => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Products Sale',
                'description'       => 'check list of sale products',
                'author_id'         => 2,
                'value'             => null,
                'handler'           => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Categories Sale',
                'description'       => 'check list of sale categories',
                'author_id'         => 3,
                'value'             => null,
                'handler'           => 3,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('discount_forms')->truncate();

        DB::table('discount_forms')->insert([
            [
                'code'              => '1',
                'name'              => 'Discount Invoice Amount',
                'description'       => 'discount invoice total amount',
                'author_id'         => 1,
                'target_type'       => DiscountTarget::INVOICE,
                'target_id'         => null,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 100000,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'              => '2',
                'name'              => 'Discount Invoice Percent',
                'description'       => 'discount invoice total percent',
                'author_id'         => 2,
                'target_type'       => DiscountTarget::INVOICE,
                'target_id'         => null,
                'discount_type'     => DiscountType::PERCENT,
                'discount_value'    => 15,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'              => '3',
                'name'              => 'Discount Product Amount',
                'description'       => 'discount invoice product amount',
                'author_id'         => 3,
                'target_type'       => DiscountTarget::PRODUCT,
                'target_id'         => 1,
                'discount_type'     => DiscountType::AMOUNT,
                'discount_value'    => 50000,
                'discount_maximum'  => null,
                'discount_minimum'  => null,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
