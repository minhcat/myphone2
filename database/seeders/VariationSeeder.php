<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Variation;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variation::truncate();

        Variation::factory(40)->create();

        // DB::table('variations')->truncate();
        // DB::table('option_variation')->truncate();

        // DB::table('option_variation')->insert([
        //     // red/classic/large
        //     [
        //         'option_id'     => 1,
        //         'variation_id'  => 1
        //     ],
        //     [
        //         'option_id'     => 5,
        //         'variation_id'  => 1
        //     ],
        //     [
        //         'option_id'     => 9,
        //         'variation_id'  => 1
        //     ],
        //     // blue/morden/large
        //     [
        //         'option_id'     => 2,
        //         'variation_id'  => 2
        //     ],
        //     [
        //         'option_id'     => 6,
        //         'variation_id'  => 2
        //     ],
        //     [
        //         'option_id'     => 9,
        //         'variation_id'  => 2
        //     ],
        //     // classic/mini
        //     [
        //         'option_id'     => 5,
        //         'variation_id'  => 3
        //     ],
        //     [
        //         'option_id'     => 7,
        //         'variation_id'  => 3
        //     ],

        //     // red/classic/large
        //     [
        //         'option_id'     => 1,
        //         'variation_id'  => 4
        //     ],
        //     [
        //         'option_id'     => 5,
        //         'variation_id'  => 4
        //     ],
        //     [
        //         'option_id'     => 9,
        //         'variation_id'  => 4
        //     ],
        //     // blue/morden/large
        //     [
        //         'option_id'     => 2,
        //         'variation_id'  => 5
        //     ],
        //     [
        //         'option_id'     => 6,
        //         'variation_id'  => 5
        //     ],
        //     [
        //         'option_id'     => 9,
        //         'variation_id'  => 5
        //     ],
        //     // classic/mini
        //     [
        //         'option_id'     => 5,
        //         'variation_id'  => 6
        //     ],
        //     [
        //         'option_id'     => 7,
        //         'variation_id'  => 6
        //     ],
        // ]);
    }
}
