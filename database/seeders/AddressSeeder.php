<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::truncate();

        Address::factory(100)->create();
    }
}
