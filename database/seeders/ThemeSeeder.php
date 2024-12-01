<?php

namespace Database\Seeders;

use App\Enums\ThemeStatus;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Theme\Entities\Theme;
use Modules\Theme\Entities\ThemeSetting;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::truncate();

        Theme::insert(config('seeder.theme'));

        ThemeSetting::truncate();

        ThemeSetting::insert(config('seeder.theme_setting'));
    }
}
