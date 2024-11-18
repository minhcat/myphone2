<?php

namespace Database\Seeders;

use App\Enums\ThemeStatus;
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
                'info_images'   => '["01.png","02.png","03.png","04.png","05.png","06.png","07.png","08.png","09.png"]',
                'path'          => 'adminlte',
                'description'   => 
                    '<h3>AdminLTE - Bootstrap 5 Admin Dashboard</h3>
                    <br>
                    <p>AdminLTE is a fully responsive administration template. Based on Bootstrap 5 framework and also the JavaScript plugins. Highly customizable and easy to use. Fits many screen resolutions from small mobile devices to large desktops.</p>
                    <br/>
                    <h4>Looking for Premium Templates?</h4>
                    <br>
                    <p>AdminLTE.io just opened a new premium templates page. Hand picked to ensure the best quality and the most affordable prices. Visit https://adminlte.io/premium for more information.</p>
                    <p>AdminLTE has been carefully coded with clear comments in all of its JS, SCSS and HTML files. SCSS has been used to increase code customizability.</p>
                    <br/>',
                'author_id'     => 1,
                'is_active'     => ThemeStatus::ACTIVE,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'KaiAdmin',
                'primary_image' => 'template.png',
                'info_images'   => '["01.png","02.png","03.png","04.png","05.png","06.png","07.png","08.png","09.png"]',
                'path'          => 'kaiadmin',
                'description'   => 
                    '<h3>Kaiadmin Lite - Free Bootstrap 5 Admin Dashboard</h3>
                    <br>
                    <p>This time, I want to introduce you Kaiadmin Lite – a free Bootstrap 5 Admin Dashboard built to easily manage and visualize business data.</p>
                    <br>
                    <p>With Kaiadmin Lite, you can complete development faster with no design skills required. Save 1000s of hours of designing and coding work, as we\'ve already done that for you.</p>
                    <br>
                    <p>Don\'t worry about getting started – we\'ve documented how to get started using this dashboard template and utilizing the available components and plugins, making it easy to leverage the full potential of Kaiadmin Bootstrap 5 Admin Dashboard.</p>
                    <br/>',
                'author_id'     => 1,
                'is_active'     => ThemeStatus::UNACTIVE,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('theme_settings')->truncate();

        DB::table('theme_settings')->insert([
            [
                'theme_id'          => 1,
                'author_id'         => 1,
                'sidebar_collapse'  => false,
                'menu_skin'         => 'blue',
                'sidebar_skin'      => 'black'
            ],
            [
                'theme_id'          => 2,
                'author_id'         => 1,
                'sidebar_collapse'  => false,
                'menu_skin'         => 'blue',
                'sidebar_skin'      => 'black'
            ],
        ]);
    }
}
