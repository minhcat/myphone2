<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('category_product')->truncate();

        DB::table('categories')->insert([
            [
                'name'          => 'phone',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => null,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'smartphone',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'cellphone',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'laptop',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => null,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'tablet',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('category_product')->insert([
            [
                'category_id'   => 1,
                'product_id'    => 1,
            ],
            [
                'category_id'   => 1,
                'product_id'    => 2,
            ],
            [
                'category_id'   => 1,
                'product_id'    => 3,
            ],
            [
                'category_id'   => 1,
                'product_id'    => 4,
            ],
            [
                'category_id'   => 1,
                'product_id'    => 5,
            ],
        ]);
    }
}