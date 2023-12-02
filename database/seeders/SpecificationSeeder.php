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
                'created_at'    => now()->format('Y-m-d h:i:s'),
                'updated_at'    => now()->format('Y-m-d h:i:s'),
            ],
            [
                'name'          => 'RAM',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d h:i:s'),
                'updated_at'    => now()->format('Y-m-d h:i:s'),
            ],
            [
                'name'          => 'Hard disk',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d h:i:s'),
                'updated_at'    => now()->format('Y-m-d h:i:s'),
            ],
            [
                'name'          => 'Graphics card',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d h:i:s'),
                'updated_at'    => now()->format('Y-m-d h:i:s'),
            ],
            [
                'name'          => 'OS',
                'description'   => Lorem::paragraph(3),
                'author_id'     => 1,
                'note'          => Lorem::paragraph(1),
                'created_at'    => now()->format('Y-m-d h:i:s'),
                'updated_at'    => now()->format('Y-m-d h:i:s'),
            ],
        ]);
    }
}
