<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\Entities\Permission;
use Modules\Permission\Entities\PermissionRole;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();

        Permission::factory(174)->create();

        PermissionRole::truncate();

        PermissionRole::factory(591)->create();
    }
}
