<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $data = [
            [
                'name'          => 'Iphone 14 Promax',
                'slug'          => 'iphone-14-promax',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0001',
                'price'         => 45000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Samsung Galaxy S23 Ultra',
                'slug'          => 'samsung-galaxy-s23-ultra',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0002',
                'price'         => 42000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 2,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Xiaomi 13 Pro',
                'slug'          => 'xiaomi-13-pro',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0003',
                'price'         => 36000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 3,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'OPPO Find X5 Pro',
                'slug'          => 'oppo-find-x5-pro',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0004',
                'price'         => 32000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Vivo V25E',
                'slug'          => 'vivo-v25e',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0005',
                'price'         => 8000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Realme 10',
                'slug'          => 'realme-10',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0006',
                'price'         => 7000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 6,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Nokia G22',
                'slug'          => 'nokia-g22',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0007',
                'price'         => 6000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 7,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Vsmart Joy 4',
                'slug'          => 'vsmart-joy-4',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0008',
                'price'         => 5000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 8,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'ASUS ROG Phone 6',
                'slug'          => 'asus-rog-phone-6',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0009',
                'price'         => 20000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 9,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Itel L6502',
                'slug'          => 'itel-l6502',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0010',
                'price'         => 2000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 10,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Iphone 13',
                'slug'          => 'iphone-13',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0011',
                'price'         => 35000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Samsung Galaxy S22',
                'slug'          => 'samsung-galaxy-s22',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0012',
                'price'         => 32000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 2,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Xiaomi 12',
                'slug'          => 'xiaomi-12',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0013',
                'price'         => 24000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 3,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'OPPO Find X4',
                'slug'          => 'oppo-find-x4',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0014',
                'price'         => 20000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 4,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Vivo V24',
                'slug'          => 'vivo-v24',
                'sku_prefix'    => 'PRO',
                'sku_number'    => '0015',
                'price'         => 6000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => 5,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ];

        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'name'          => 'smartphone ' . $i,
                'slug'          => 'smartphone-' . $i,
                'sku_prefix'    => 'PRO',
                'sku_number'    => '00' . (15 + $i),
                'price'         => 5000000,
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'brand_id'      => null,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ];
        }

        DB::table('products')->insert($data);
    }
}
