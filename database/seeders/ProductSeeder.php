<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Entities\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        session()->flush();

        Product::truncate();

        Product::factory(120)->create();

        Product::insert(config('seeder.product'));
    }
}
