<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Entities\Detail;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail::truncate();

        Detail::factory(1000)->create();
    }
}
