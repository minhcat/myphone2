<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        DB::table('permissions')->insert([
            [
                'name'          => 'Browse',
                'key'           => 'user:browse',
                'table'         => 'users',
                'description'   => Lorem::paragraph(),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Read',
                'key'           => 'user:read',
                'table'         => 'users',
                'description'   => Lorem::paragraph(),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Add',
                'key'           => 'user:add',
                'table'         => 'users',
                'description'   => Lorem::paragraph(),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Edit',
                'key'           => 'user:edit',
                'table'         => 'users',
                'description'   => Lorem::paragraph(),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Delete',
                'key'           => 'user:delete',
                'table'         => 'users',
                'description'   => Lorem::paragraph(),
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
