<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\Entities\Permission;

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

        Permission::factory(180)->create();
    }
}
