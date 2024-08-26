<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Entities\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        session()->flush();

        Product::truncate();

        Product::factory(60)->create();

        // DB::table('products')->truncate();

        // $data = [
        //     [
        //         'name'          => 'Ipad 9',
        //         'slug'          => 'ipad-9',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0026',
        //         'price'         => 7200000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 1,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'OPPO Pad Neo',
        //         'slug'          => 'oppo-pad-neo',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0027',
        //         'price'         => 6990000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 4,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Samsung Galaxy Tab A9',
        //         'slug'          => 'samsung-galaxy-tab-a9',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0028',
        //         'price'         => 6690000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 2,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Lenovo Tab M10',
        //         'slug'          => 'lenovo-tab-m10',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0029',
        //         'price'         => 5290000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 15,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Xiaomi Redmi Pad SE',
        //         'slug'          => 'xiaomi-redmi-pad-se',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0030',
        //         'price'         => 4290000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 3,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Airpod Gen 2',
        //         'slug'          => 'airpod-gen-2',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0031',
        //         'price'         => 5200000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 1,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Samsung IA500',
        //         'slug'          => 'samsung-ia500',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0032',
        //         'price'         => 250000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 2,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Apacer USB 2',
        //         'slug'          => 'apacer-usb-2',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0033',
        //         'price'         => 220000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 0,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'name'          => 'Sandisk USB 2',
        //         'slug'          => 'sandisk-usb-2',
        //         'sku_prefix'    => 'PRO',
        //         'sku_number'    => '0034',
        //         'price'         => 180000,
        //         'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //         'brand_id'      => 0,
        //         'author_id'     => 3,
        //         'created_at'    => now()->format('Y-m-d H:i:s'),
        //         'updated_at'    => now()->format('Y-m-d H:i:s'),
        //     ],
        // ];
    }
}
