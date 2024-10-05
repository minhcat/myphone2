<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cart\Entities\Cart;
use Modules\Cart\Entities\CartDetail;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::truncate();

        Cart::factory(50)->create();

        CartDetail::truncate();

        CartDetail::factory(150)->create();
    }
}
