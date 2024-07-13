<?php

namespace Database\Seeders;

use App\Enums\TerritoryType;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->truncate();

        DB::table('areas')->insert([
            [
                'name'          => 'Ngoại tỉnh Hà Nội',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Ngoại thành Hà Nội',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Nội thành Hà Nội',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Ngoại tỉnh Sài Gòn',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Ngoại thành Sài Gòn',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Nội thành Sài Gòn',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('area_details')->truncate();

        DB::table('area_details')->insert([
            [
                'area_id'           => 4,
                'territory_type'    => TerritoryType::CITY,
                'territory_id'      => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 4,
                'territory_type'    => TerritoryType::CITY,
                'territory_id'      => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 5,
                'territory_type'    => TerritoryType::DISTRICT,
                'territory_id'      => 6,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 5,
                'territory_type'    => TerritoryType::DISTRICT,
                'territory_id'      => 7,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 5,
                'territory_type'    => TerritoryType::DISTRICT,
                'territory_id'      => 8,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 6,
                'territory_type'    => TerritoryType::DISTRICT,
                'territory_id'      => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 6,
                'territory_type'    => TerritoryType::DISTRICT,
                'territory_id'      => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 6,
                'territory_type'    => TerritoryType::DISTRICT,
                'territory_id'      => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'area_id'           => 6,
                'territory_type'    => TerritoryType::DISTRICT,
                'territory_id'      => 5,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
