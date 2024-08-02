<?php

namespace Database\Seeders;

use App\Enums\TotalRangeType;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transport_fees')->truncate();

        DB::table('transport_fees')->insert([
            [
                'name'                      => 'GiaoHangNhanh',
                'description'               => Lorem::paragraph(3),
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                      => 'VietnamPost',
                'description'               => Lorem::paragraph(3),
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                      => 'J&T Express',
                'description'               => Lorem::paragraph(3),
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('transport_fee_areas')->truncate();

        DB::table('transport_fee_areas')->insert([
            [
                'transport_fee_id'          => 1,
                'area_id'                   => 4,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 1,
                'area_id'                   => 5,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 1,
                'area_id'                   => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 2,
                'area_id'                   => 4,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 2,
                'area_id'                   => 5,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 2,
                'area_id'                   => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 3,
                'area_id'                   => 4,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 3,
                'area_id'                   => 5,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_id'          => 3,
                'area_id'                   => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('transport_fee_area_cases')->truncate();

        DB::table('transport_fee_area_cases')->insert([
            [
                'transport_fee_area_id'     => 1,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 1,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 2,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 2,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 3,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 3,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 4,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 4,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 5,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 5,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 6,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 6,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 7,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 7,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 8,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 8,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 9,
                'transporter_case_id'       => 6,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_id'     => 9,
                'transporter_case_id'       => 7,
                'author_id'                 => 1,
                'created_at'                => now()->format('Y-m-d H:i:s'),
                'updated_at'                => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('transport_fee_area_case_ranges')->truncate();

        DB::table('transport_fee_area_case_ranges')->insert([
            [
                'transport_fee_area_case_id'    => 1,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 0,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 5000000,
                'cost'                          => 86000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 1,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 5000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 15000000,
                'cost'                          => 46000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 1,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 15000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => null,
                'cost'                          => 26000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 2,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 0,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 5000000,
                'cost'                          => 145000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 2,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 5000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 15000000,
                'cost'                          => 85000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 2,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 15000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => null,
                'cost'                          => 45000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 3,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 0,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 5000000,
                'cost'                          => 44000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 3,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 5000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 15000000,
                'cost'                          => 24000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 3,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 15000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => null,
                'cost'                          => 14000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 4,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 0,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 5000000,
                'cost'                          => 83000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 4,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 5000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => 15000000,
                'cost'                          => 43000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'transport_fee_area_case_id'    => 4,
                'total_range_bottom_type'       => TotalRangeType::EQUAL,
                'total_range_bottom'            => 15000000,
                'total_range_top_type'          => TotalRangeType::NOT_EQUAL,
                'total_range_top'               => null,
                'cost'                          => 23000,
                'author_id'                     => 1,
                'created_at'                    => now()->format('Y-m-d H:i:s'),
                'updated_at'                    => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
