<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Specification\Entities\Information;
use Modules\Specification\Entities\Specification;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specification::truncate();

        Specification::factory(8)->create();

        Information::truncate();

        Information::factory(48)->create();
    }
}
