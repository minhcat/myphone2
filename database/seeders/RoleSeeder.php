<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Role\Entities\Role;

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

        DB::table('role_user')->insert([
            [
                'role_id'   => 1,
                'user_id'   => 1,
            ],
            [
                'role_id'   => 2,
                'user_id'   => 2,
            ],
            [
                'role_id'   => 3,
                'user_id'   => 3,
            ],
        ]);
    }
}
