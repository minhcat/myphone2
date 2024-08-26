<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
