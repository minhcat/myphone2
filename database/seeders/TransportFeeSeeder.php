<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TransportFee\Entities\TransportFee;

class TransportFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransportFee::truncate();

        TransportFee::factory(162)->create();
    }
}
