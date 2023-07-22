<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->truncate();

        $data = [
            [
                'name'          => 'Apple',
                'country'       => 'usa',
                'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
                'author_id'     => 1,
                'note'          => 'Lorem ipsum dolor sit amet?',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Samsung',
                'country'       => 'korea',
                'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
                'author_id'     => 1,
                'note'          => 'Lorem ipsum dolor sit amet?',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Xiaomi',
                'country'       => 'china',
                'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
                'author_id'     => 1,
                'note'          => 'Lorem ipsum dolor sit amet?',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'OPPO',
                'country'       => 'china',
                'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
                'author_id'     => 1,
                'note'          => 'Lorem ipsum dolor sit amet?',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Vsmart',
                'country'       => 'vietnam',
                'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
                'author_id'     => 1,
                'note'          => 'Lorem ipsum dolor sit amet?',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'name'          => 'brand '.$i,
                'country'       => 'other',
                'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
                'author_id'     => 1,
                'note'          => 'Lorem ipsum dolor sit amet?',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ];
        }

        DB::table('brands')->insert($data);
    }
}
