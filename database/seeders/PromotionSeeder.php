<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Promotion\Entities\Promotion;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::truncate();

        Promotion::factory(30)->create();
    }
}
