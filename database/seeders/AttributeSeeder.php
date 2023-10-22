<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->truncate();

        DB::table('attributes')->insert([
            [
                'name'          => 'color',
                'description'   => Lorem::paragraph(3),
                'note'          => Lorem::paragraph(1),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'style',
                'description'   => Lorem::paragraph(3),
                'note'          => Lorem::paragraph(1),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'size',
                'description'   => Lorem::paragraph(3),
                'note'          => Lorem::paragraph(1),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('options')->truncate();

        DB::table('options')->insert([
            [
                'value'         => 'red',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'value'         => 'blue',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'value'         => 'black',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'value'         => 'classic',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 2,
                'author_id'     => 2,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'value'         => 'modern',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 2,
                'author_id'     => 2,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'value'         => 'mini',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 3,
                'author_id'     => 3,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'value'         => 'normal',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 3,
                'author_id'     => 3,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'value'         => 'large',
                'description'   => Lorem::paragraph(1),
                'attribute_id'  => 3,
                'author_id'     => 3,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
