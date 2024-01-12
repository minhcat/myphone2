<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specifications')->truncate();

        DB::table('specifications')->insert([
            [
                'name'          => 'CPU',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'RAM',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Hard disk',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Graphics card',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'OS',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('informations')->truncate();

        DB::table('informations')->insert([
            [
                'value'             => 'Core I3',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Core I5',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Core I7',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '4 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '8 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '16 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '512 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '1 TB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Intel UHD Graphics',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Intel Iris Xe Graphics',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Windows 10',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 5,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Ubuntu',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 5,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}