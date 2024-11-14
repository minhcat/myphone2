<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->truncate();

        DB::table('themes')->insert([
            [
                'name'          => 'AdminLTE',
                'primary_image' => 'template.png',
                'info_images'   => '["template.png"]',
                'path'          => 'adminlte',
                'description'   => Lorem::paragraph(),
                'author_id'     => 1,
                'is_active'     => 0,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'KaiAdmin',
                'primary_image' => 'template.png',
                'info_images'   => '["template.png"]',
                'path'          => 'adminlte',
                'description'   => Lorem::paragraph(),
                'author_id'     => 1,
                'is_active'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
