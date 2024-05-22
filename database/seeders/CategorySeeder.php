<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
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
                'name'          => 'gaming smartphone',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 2,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'camera smartphone',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 2,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'light smartphone',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 2,
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
                'name'          => 'gaming laptop',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 7,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'graphics laptop',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 7,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'office laptop',
                'description'   => Lorem::paragraph(3),
                'note'          => null,
                'parent_id'     => 7,
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
            // 1
            [
                'category_id'   => 1,
                'product_id'    => 1,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 1,
            ],
            [
                'category_id'   => 3,
                'product_id'    => 1,
            ],
            [
                'category_id'   => 4,
                'product_id'    => 1,
            ],
            // 2
            [
                'category_id'   => 1,
                'product_id'    => 2,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 2,
            ],
            [
                'category_id'   => 3,
                'product_id'    => 2,
            ],
            [
                'category_id'   => 4,
                'product_id'    => 2,
            ],
            // 3
            [
                'category_id'   => 1,
                'product_id'    => 3,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 3,
            ],
            [
                'category_id'   => 3,
                'product_id'    => 3,
            ],
            // 4
            [
                'category_id'   => 1,
                'product_id'    => 4,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 4,
            ],
            [
                'category_id'   => 4,
                'product_id'    => 4,
            ],
            // 5
            [
                'category_id'   => 1,
                'product_id'    => 5,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 5,
            ],
            [
                'category_id'   => 4,
                'product_id'    => 5,
            ],
            // 6
            [
                'category_id'   => 1,
                'product_id'    => 6,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 6,
            ],
            [
                'category_id'   => 5,
                'product_id'    => 6,
            ],
            // 7
            [
                'category_id'   => 1,
                'product_id'    => 7,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 7,
            ],
            [
                'category_id'   => 5,
                'product_id'    => 7,
            ],
            // 8
            [
                'category_id'   => 1,
                'product_id'    => 8,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 8,
            ],
            [
                'category_id'   => 5,
                'product_id'    => 8,
            ],
            // 9
            [
                'category_id'   => 1,
                'product_id'    => 9,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 9,
            ],
            [
                'category_id'   => 3,
                'product_id'    => 9,
            ],
            // 10
            [
                'category_id'   => 1,
                'product_id'    => 10,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 10,
            ],
            [
                'category_id'   => 5,
                'product_id'    => 10,
            ],
            // 11
            [
                'category_id'   => 1,
                'product_id'    => 11,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 11,
            ],
            // 12
            [
                'category_id'   => 1,
                'product_id'    => 12,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 12,
            ],
            // 13
            [
                'category_id'   => 1,
                'product_id'    => 13,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 13,
            ],
            // 14
            [
                'category_id'   => 1,
                'product_id'    => 14,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 14,
            ],
            // 15
            [
                'category_id'   => 1,
                'product_id'    => 15,
            ],
            [
                'category_id'   => 2,
                'product_id'    => 15,
            ],
            // 16
            [
                'category_id'   => 1,
                'product_id'    => 16,
            ],
            [
                'category_id'   => 6,
                'product_id'    => 16,
            ],
            // 17
            [
                'category_id'   => 1,
                'product_id'    => 17,
            ],
            [
                'category_id'   => 6,
                'product_id'    => 17,
            ],
            // 18
            [
                'category_id'   => 1,
                'product_id'    => 18,
            ],
            [
                'category_id'   => 6,
                'product_id'    => 18,
            ],
            // 19
            [
                'category_id'   => 1,
                'product_id'    => 19,
            ],
            [
                'category_id'   => 6,
                'product_id'    => 19,
            ],
            // 20
            [
                'category_id'   => 1,
                'product_id'    => 20,
            ],
            [
                'category_id'   => 6,
                'product_id'    => 20,
            ],
            // 21
            [
                'category_id'   => 7,
                'product_id'    => 21,
            ],
            // 22
            [
                'category_id'   => 7,
                'product_id'    => 22,
            ],
            // 23
            [
                'category_id'   => 7,
                'product_id'    => 23,
            ],
            // 24
            [
                'category_id'   => 7,
                'product_id'    => 24,
            ],
            // 25
            [
                'category_id'   => 7,
                'product_id'    => 25,
            ],
            // 26
            [
                'category_id'   => 1,
                'product_id'    => 26,
            ],
            [
                'category_id'   => 11,
                'product_id'    => 26,
            ],
            // 27
            [
                'category_id'   => 1,
                'product_id'    => 27,
            ],
            [
                'category_id'   => 11,
                'product_id'    => 27,
            ],
            // 28
            [
                'category_id'   => 1,
                'product_id'    => 28,
            ],
            [
                'category_id'   => 11,
                'product_id'    => 28,
            ],
            // 29
            [
                'category_id'   => 1,
                'product_id'    => 29,
            ],
            [
                'category_id'   => 11,
                'product_id'    => 29,
            ],
            // 30
            [
                'category_id'   => 1,
                'product_id'    => 30,
            ],
            [
                'category_id'   => 11,
                'product_id'    => 30,
            ],
        ]);
    }
}
