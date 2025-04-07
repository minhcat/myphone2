<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->truncate();

        DB::table('configs')->insert([
            [
                'name'          => 'website title',
                'type'          => 'string',
                'value'         => 'MyPhone',
                'default'       => 'MyPhone',
                'group'         => 'common',
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'company name',
                'type'          => 'string',
                'value'         => 'MyPhone',
                'default'       => 'MyPhone',
                'group'         => 'common',
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'company address',
                'type'          => 'string',
                'value'         => '123 Phạm Văn Đồng',
                'default'       => '123 Phạm Văn Đồng',
                'group'         => 'common',
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'home page name',
                'type'          => 'string',
                'value'         => 'Home',
                'default'       => 'Home',
                'group'         => 'page',
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
            [
                'name'          => 'category page name',
                'type'          => 'string',
                'value'         => 'Category',
                'default'       => 'Category',
                'group'         => 'page',
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
