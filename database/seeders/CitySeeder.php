<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();

        DB::table('cities')->insert([
            [
                'name'          => 'Bắc Ninh',
                'shortname'     => 'BN',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Bình Dương',
                'shortname'     => 'BĐ',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Đồng Nai',
                'shortname'     => 'ĐN',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Thành phố Hà Nội',
                'shortname'     => 'TP.HN',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Thành phố Hồ Chí Minh',
                'shortname'     => 'TP.HCM',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
        ]);

        DB::table('districts')->truncate();

        DB::table('districts')->insert([
            [
                'name'          => 'Quận 1',
                'shortname'     => 'Q1',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 2',
                'shortname'     => 'Q2',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 3',
                'shortname'     => 'Q3',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 4',
                'shortname'     => 'Q4',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 5',
                'shortname'     => 'Q5',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Bình Thạnh',
                'shortname'     => 'Q.BT',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Gò Vấp',
                'shortname'     => 'Q.GV',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Thủ Đức',
                'shortname'     => 'Q.TĐ',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Hai Bà Trưng',
                'shortname'     => 'Q.HBT',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Ba Đình',
                'shortname'     => 'Q.BĐ',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Đống Đa',
                'shortname'     => 'Q.ĐĐ',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Hoàn Kiếm',
                'shortname'     => 'Q.HK',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
        ]);

        DB::table('wards')->truncate();

        DB::table('wards')->insert([
            // quận 1
            [
                'name'          => 'Phường Bến Nghé',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường Đa Kao',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường Bến Thành',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            // quận 2
            [
                'name'          => 'Phường Thảo Điền',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 2,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường An Lợi Đông',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 2,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường An Khánh',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 2,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            // quận 3
            [
                'name'          => 'Phường 1',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 3,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 2',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 3,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 3',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 3,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            // quận 4
            [
                'name'          => 'Phường 1',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 2',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 3',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            // quận 5
            [
                'name'          => 'Phường 1',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 2',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 3',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            // quận bình thạnh
            [
                'name'          => 'Phường 1',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 6,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 2',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 6,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 3',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 6,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            // quận gò vấp
            [
                'name'          => 'Phường 1',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 7,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 3',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 7,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường 4',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 7,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            // quận thủ đức
            [
                'name'          => 'Phường Bình Chiểu',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 8,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường Hiệp Bình Chánh',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 8,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Phường Linh Xuân',
                'description'   => Lorem::paragraph(3),
                'district_id'   => 8,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}