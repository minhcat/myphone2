<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tag\Entities\ProductTag;
use Modules\Tag\Entities\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        Tag::insert(config('seeder.tag'));

        ProductTag::truncate();

        ProductTag::factory(1000)->create();
    }
}
