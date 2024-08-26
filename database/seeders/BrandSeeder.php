<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Brand\Entities\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();

        Brand::insert(config('seeder.brand'));
    }
}
