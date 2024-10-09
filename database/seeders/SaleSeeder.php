<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SaleProduct;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::truncate();

        Sale::factory(30)->create();

        SaleProduct::truncate();

        SaleProduct::factory(90)->create();
    }
}
