<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Attribute\Entities\Attribute;
use Modules\Attribute\Entities\Option;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::truncate();

        Attribute::insert(config('seeder.attribute'));

        Option::truncate();

        Option::insert(config('seeder.option'));
    }
}
