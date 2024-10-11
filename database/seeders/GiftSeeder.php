<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Gift\Entities\Gift;
use Modules\Gift\Entities\GiftProduct;
use Modules\Gift\Entities\GiftProductItem;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gift::truncate();

        Gift::factory(5)->create();

        GiftProduct::truncate();

        GiftProduct::factory(15)->create();

        GiftProductItem::truncate();

        GiftProductItem::factory(30)->create();
    }
}
