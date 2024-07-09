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
                'name'          => 'Thành phố Hồ Chí Minh',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Thành phố Hà Nội',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Đồng Nai',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Bình Dương',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Bắc Ninh',
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
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 2',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 3',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 4',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận 5',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Bình Thạnh',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Gò Vấp',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'Quận Thủ Đức',
                'description'   => Lorem::paragraph(3),
                'city_id'       => 1,
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
