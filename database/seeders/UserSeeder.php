<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\Address;
use Modules\User\Entities\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::insert(config('seeder.user'));

        User::factory(48)->create();

        Address::truncate();

        Address::factory(100)->create();
    }
}
