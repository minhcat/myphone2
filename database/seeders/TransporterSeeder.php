<?php

namespace Database\Seeders;

use App\Enums\EstimateTimeType;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transporters')->truncate();

        DB::table('transporters')->insert([
            [
                'name'          => 'GiaoHangNhanh',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'VietnamPost',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'J&T Express',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('transporter_cases')->truncate();

        DB::table('transporter_cases')->insert([
            [
                'name'                  => 'Normal',
                'description'           => Lorem::paragraph(3),
                'transporter_id'        => 3,
                'estimate_time_type'    => EstimateTimeType::DAY,
                'estimate_time'         => 2,
                'author_id'             => 1,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                  => 'Fast',
                'description'           => Lorem::paragraph(3),
                'transporter_id'        => 3,
                'estimate_time_type'    => EstimateTimeType::HOUR,
                'estimate_time'         => 6,
                'author_id'             => 1,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                  => 'Cheap',
                'description'           => Lorem::paragraph(3),
                'transporter_id'        => 3,
                'estimate_time_type'    => EstimateTimeType::DAY,
                'estimate_time'         => 4,
                'author_id'             => 1,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                  => 'Normal',
                'description'           => Lorem::paragraph(3),
                'transporter_id'        => 2,
                'estimate_time_type'    => EstimateTimeType::DAY,
                'estimate_time'         => 2,
                'author_id'             => 1,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                  => 'Fast',
                'description'           => Lorem::paragraph(3),
                'transporter_id'        => 2,
                'estimate_time_type'    => EstimateTimeType::DAY,
                'estimate_time'         => 1,
                'author_id'             => 1,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                  => 'Normal',
                'description'           => Lorem::paragraph(3),
                'transporter_id'        => 1,
                'estimate_time_type'    => EstimateTimeType::DAY,
                'estimate_time'         => 2,
                'author_id'             => 1,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                  => 'Fast',
                'description'           => Lorem::paragraph(3),
                'transporter_id'        => 1,
                'estimate_time_type'    => EstimateTimeType::DAY,
                'estimate_time'         => 1,
                'author_id'             => 1,
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
