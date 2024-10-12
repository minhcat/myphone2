<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\City\Entities\City;
use Modules\City\Entities\District;
use Modules\City\Entities\Ward;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        City::factory(2)->create();

        District::truncate();

        District::factory(8)->create();

        Ward::truncate();
    
        Ward::factory(116)->create();
    }
}
