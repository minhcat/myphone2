<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variations')->truncate();
        DB::table('option_variation')->truncate();

        DB::table('variations')->insert([
            [
                'code'          => '#1148',
                'author_id'     => 1,
                'description'   => Lorem::paragraph(3),
                'price'         => 20000000,
                'product_id'    => 1
            ],
            [
                'code'          => '#1258',
                'author_id'     => 1,
                'description'   => Lorem::paragraph(3),
                'price'         => 22000000,
                'product_id'    => 1
            ],
            [
                'code'          => '#1048',
                'author_id'     => 1,
                'description'   => Lorem::paragraph(3),
                'price'         => 15000000,
                'product_id'    => 1
            ],
            [
                'code'          => '#1068',
                'author_id'     => 1,
                'description'   => Lorem::paragraph(3),
                'price'         => 20000000,
                'product_id'    => 2
            ],
            [
                'code'          => '#1058',
                'author_id'     => 1,
                'description'   => Lorem::paragraph(3),
                'price'         => 22000000,
                'product_id'    => 2
            ],
            [
                'code'          => '#1098',
                'author_id'     => 1,
                'description'   => Lorem::paragraph(3),
                'price'         => 15000000,
                'product_id'    => 2
            ],
        ]);

        DB::table('option_variation')->insert([
            // red/classic/large
            [
                'option_id'     => 1,
                'variation_id'  => 1
            ],
            [
                'option_id'     => 5,
                'variation_id'  => 1
            ],
            [
                'option_id'     => 9,
                'variation_id'  => 1
            ],
            // blue/morden/large
            [
                'option_id'     => 2,
                'variation_id'  => 2
            ],
            [
                'option_id'     => 6,
                'variation_id'  => 2
            ],
            [
                'option_id'     => 9,
                'variation_id'  => 2
            ],
            // classic/mini
            [
                'option_id'     => 5,
                'variation_id'  => 3
            ],
            [
                'option_id'     => 7,
                'variation_id'  => 3
            ],

            // red/classic/large
            [
                'option_id'     => 1,
                'variation_id'  => 4
            ],
            [
                'option_id'     => 5,
                'variation_id'  => 4
            ],
            [
                'option_id'     => 9,
                'variation_id'  => 4
            ],
            // blue/morden/large
            [
                'option_id'     => 2,
                'variation_id'  => 5
            ],
            [
                'option_id'     => 6,
                'variation_id'  => 5
            ],
            [
                'option_id'     => 9,
                'variation_id'  => 5
            ],
            // classic/mini
            [
                'option_id'     => 5,
                'variation_id'  => 6
            ],
            [
                'option_id'     => 7,
                'variation_id'  => 6
            ],
        ]);
    }
}
