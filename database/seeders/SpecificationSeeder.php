<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Specification\Entities\Specification;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specification::truncate();

        Specification::factory(8)->create();

        // DB::table('specifications')->truncate();

        // DB::table('specifications')->insert([
        //     [
        //         'name'          => 'CPU',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 1,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'RAM',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 1,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Hard disk',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 1,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Graphics card',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 1,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'OS',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 1,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Screen',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 2,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Battery',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 2,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Weight',
        //         'description'   => Lorem::paragraph(3),
        //         'author_id'     => 2,
        //         'note'          => Lorem::paragraph(1),
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        // ]);

        DB::table('informations')->truncate();

        DB::table('informations')->insert([
            // cpu: id: 1
            [
                'value'             => 'Core I3',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Core I5',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Core I7',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Apple A17 Pro',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Apple A16 Bionic',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Apple A15 Bionic',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Snapdragon 8',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Snapdragon 7',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'MediaTek Helio',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 1,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            // ram: id: 2
            [
                'value'             => '1 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '2 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '4 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '8 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '16 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 2,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            // hard disk: id: 3
            [
                'value'             => '128 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '256 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '512 GB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '1 TB',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 3,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            // graphics card: id: 4
            [
                'value'             => 'Apple GPU',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Adreno 740',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Mali G52',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Intel UHD Graphics',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Intel Iris Xe Graphics',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 4,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            // os: id: 5
            [
                'value'             => 'iOS',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 5,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Android',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 5,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Windows 10',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 5,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => 'Ubuntu',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 5,
                'author_id'         => 1,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            // screen: id: 6
            [
                'value'             => '2.5 inch',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 6,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '6.7 inch',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 6,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '13 inch',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 6,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '14 inch',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 6,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '15 inch',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 6,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            // battery: id: 7
            [
                'value'             => '1200 mAh',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '1500 mAh',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '2000 mAh li-ion',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '3000 mAh li-ion',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '4000 mAh li-ion',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '3 cell li-ion, 50wh',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '5 cell li-ion, 70wh',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '7 cell li-ion, 100wh',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 7,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            // weight: id: 8
            [
                'value'             => '100 g',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 8,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '150 g',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 8,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '200 g',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 8,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '220 g',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 8,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '1.7 kg',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 8,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '2.3 kg',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 8,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
            [
                'value'             => '3.5 kg',
                'description'       => Lorem::paragraph(3),
                'specification_id'  => 8,
                'author_id'         => 2,
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
