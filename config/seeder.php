<?php

use App\Enums\Gender;
use Faker\Provider\Lorem;

return [
    'user'  => [
        [
            'account'       => 'minhcat',
            'firstname'     => 'Tạ Minh',
            'lastname'      => 'Cát',
            'gender'        => Gender::MALE,
            'job'           => 'developer',
            'email'         => 'minh.cat@myphone.com',
            'password'      => '$2y$10$Wh5ZPGsyfW/IMIj3OlPEjubKEfu1VXLAu4ilPu/KYBlaA5H812swq',
            'is_admin'      => true,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'account'       => 'binhnguyen',
            'firstname'     => 'Nguyễn Văn',
            'lastname'      => 'Bình',
            'gender'        => Gender::MALE,
            'job'           => 'developer',
            'email'         => 'binh.nguyen@myphone.com',
            'password'      => '$2y$10$Wh5ZPGsyfW/IMIj3OlPEjubKEfu1VXLAu4ilPu/KYBlaA5H812swq',
            'is_admin'      => true,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
    ],
    'brand' => [
        [
            'name'          => 'Apple',     // id=1
            'country'       => 'usa',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 1,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Samsung',   // id=2
            'country'       => 'korea',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 1,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Xiaomi',    // id=3
            'country'       => 'china',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 1,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'OPPO',      // id=4
            'country'       => 'china',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 1,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Vsmart',    // id=5
            'country'       => 'vietnam',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 1,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Realme',    // id=6
            'country'       => 'china',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 2,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Nokia',     // id=7
            'country'       => 'finland',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 2,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Vivo',      // id=8
            'country'       => 'china',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 2,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Mobell',    // id=9
            'country'       => 'singapore',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Itel',      // id=10
            'country'       => 'china',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Masstel',   // id=11
            'country'       => 'vietname',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Dell',      // id=12
            'country'       => 'usa',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 2,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Asus',      // id=13
            'country'       => 'taiwan',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 2,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Acer',      // id=14
            'country'       => 'taiwan',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Lenovo',    // id=15
            'country'       => 'china',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'JBL',       // id=16
            'country'       => 'usa',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Apacer',    // id=17
            'country'       => 'taiwan',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Sandisk',   // id=18
            'country'       => 'usa',
            'description'   => Lorem::paragraph(3),
            'author_id'     => 3,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
    ],
    'attribute'             => [
        [
            'name'          => 'color',
            'description'   => Lorem::paragraph(3),
            'note'          => Lorem::paragraph(1),
            'author_id'     => 1,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'style',
            'description'   => Lorem::paragraph(3),
            'note'          => Lorem::paragraph(1),
            'author_id'     => 1,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'size',
            'description'   => Lorem::paragraph(3),
            'note'          => Lorem::paragraph(1),
            'author_id'     => 1,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
    ],
    'product'               => [
        [
            'name'          => 'Airpod Gen 2',
            'slug'          => 'airpod-gen-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0031',
            'price'         => 5200000,
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'brand_id'      => 1,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Samsung IA500',
            'slug'          => 'samsung-ia500',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0032',
            'price'         => 250000,
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'brand_id'      => 2,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'JBL Live Pro 2 Wireless',
            'slug'          => 'airpod-gen-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0031',
            'price'         => 5200000,
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'brand_id'      => 16,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Apacer USB 2',
            'slug'          => 'apacer-usb-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0033',
            'price'         => 220000,
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'brand_id'      => 17,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Sandisk USB 2',
            'slug'          => 'sandisk-usb-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0034',
            'price'         => 180000,
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'brand_id'      => 18,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
    ],
    'option'                => [
        [
            'value'         => 'red',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 1,
            'author_id'     => 1,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'blue',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 1,
            'author_id'     => 1,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'black',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 1,
            'author_id'     => 1,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'white',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 1,
            'author_id'     => 1,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'classic',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 2,
            'author_id'     => 2,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'standard',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 2,
            'author_id'     => 2,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'modern',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 2,
            'author_id'     => 2,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'mini',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 3,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'normal',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 3,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
        [
            'value'         => 'large',
            'description'   => Lorem::paragraph(1),
            'attribute_id'  => 3,
            'author_id'     => 3,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ],
    ],
];