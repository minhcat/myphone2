<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examples')->truncate();

        $data = [
            [
                'name'          => 'example series 1',
                'slug'          => 'example-series-1',
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'note'          => 'note',
                'number'        => 100,
                'status'        => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'example series 2',
                'slug'          => 'example-series-2',
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'note'          => 'note',
                'number'        => 100,
                'status'        => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'example series 3',
                'slug'          => 'example-series-3',
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'note'          => 'note',
                'number'        => 100,
                'status'        => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ];

        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'name'          => 'example series '.$i,
                'slug'          => 'example-series-'.$i,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'note'          => 'note',
                'number'        => 100,
                'status'        => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ];
        }

        DB::table('examples')->insert($data);
    }
}
