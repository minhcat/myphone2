<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Area\Entities\Area;
use Modules\Area\Entities\AreaDetail;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::truncate();

        Area::factory(6)->create();

        AreaDetail::truncate();

        AreaDetail::factory(18)->create();
    }
}
