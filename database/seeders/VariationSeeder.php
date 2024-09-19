<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\OptionVariation;
use Modules\Product\Entities\Variation;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variation::truncate();

        Variation::factory(40)->create();

        OptionVariation::truncate();

        OptionVariation::factory(120)->create();
    }
}
