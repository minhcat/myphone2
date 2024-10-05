<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderDetail;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();

        Order::factory(100)->create();

        OrderDetail::truncate();

        OrderDetail::factory(300)->create();

        Order::updateSubTotalBulk();
    }
}
