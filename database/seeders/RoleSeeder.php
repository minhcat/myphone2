<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\RoleUser;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::insert(config('seeder.role'));

        RoleUser::truncate();

        RoleUser::factory(50)->create();
    }
}
