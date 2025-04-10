<?php

use App\Enums\Gender;
use App\Enums\ThemeStatus;

return [
    'user'  => update_seeder([
        [
            'account'       => 'minhcat',
            'firstname'     => 'Tạ Minh',
            'lastname'      => 'Cát',
            'gender'        => Gender::MALE,
            'job'           => 'developer',
            'email'         => 'minh.cat@myphone.com',
            'password'      => '$2y$10$Wh5ZPGsyfW/IMIj3OlPEjubKEfu1VXLAu4ilPu/KYBlaA5H812swq',  // 123456
            'is_admin'      => true,
        ],
        [
            'account'       => 'binhnguyen',
            'firstname'     => 'Nguyễn Văn',
            'lastname'      => 'Bình',
            'gender'        => Gender::MALE,
            'job'           => 'developer',
            'email'         => 'binh.nguyen@myphone.com',
            'password'      => '$2y$10$Wh5ZPGsyfW/IMIj3OlPEjubKEfu1VXLAu4ilPu/KYBlaA5H812swq',  // 123456
            'is_admin'      => true,
        ],
    ], ['timestamp']),
    'brand' => update_seeder([
        [
            'name'          => 'Apple',     // id=1
            'country'       => 'usa',
            'author_id'     => 1,
        ],
        [
            'name'          => 'Samsung',   // id=2
            'country'       => 'korea',
            'author_id'     => 1,
        ],
        [
            'name'          => 'Xiaomi',    // id=3
            'country'       => 'china',
            'author_id'     => 1,
        ],
        [
            'name'          => 'OPPO',      // id=4
            'country'       => 'china',
            'author_id'     => 1,
        ],
        [
            'name'          => 'Vsmart',    // id=5
            'country'       => 'vietnam',
            'author_id'     => 1,
        ],
        [
            'name'          => 'Realme',    // id=6
            'country'       => 'china',
            'author_id'     => 2,
        ],
        [
            'name'          => 'Nokia',     // id=7
            'country'       => 'finland',
            'author_id'     => 2,
        ],
        [
            'name'          => 'Vivo',      // id=8
            'country'       => 'china',
            'author_id'     => 2,
        ],
        [
            'name'          => 'Mobell',    // id=9
            'country'       => 'singapore',
            'author_id'     => 3,
        ],
        [
            'name'          => 'Itel',      // id=10
            'country'       => 'china',
            'author_id'     => 3,
        ],
        [
            'name'          => 'Masstel',   // id=11
            'country'       => 'vietname',
            'author_id'     => 3,
        ],
        [
            'name'          => 'Dell',      // id=12
            'country'       => 'usa',
            'author_id'     => 2,
        ],
        [
            'name'          => 'Asus',      // id=13
            'country'       => 'taiwan',
            'author_id'     => 2,
        ],
        [
            'name'          => 'Acer',      // id=14
            'country'       => 'taiwan',
            'author_id'     => 3,
        ],
        [
            'name'          => 'Lenovo',    // id=15
            'country'       => 'china',
            'author_id'     => 3,
        ],
        [
            'name'          => 'JBL',       // id=16
            'country'       => 'usa',
            'author_id'     => 3,
        ],
        [
            'name'          => 'Apacer',    // id=17
            'country'       => 'taiwan',
            'author_id'     => 3,
        ],
        [
            'name'          => 'Sandisk',   // id=18
            'country'       => 'usa',
            'author_id'     => 3,
        ],
    ], ['timestamp', 'description', 'note']),
    'attribute'             => update_seeder([
        [
            'name'          => 'color',
            'author_id'     => 1,
        ],
        [
            'name'          => 'style',
            'author_id'     => 1,
        ],
        [
            'name'          => 'size',
            'author_id'     => 1,
        ],
    ], ['timestamp', 'description', 'note']),
    'product'               => update_seeder([
        [
            'name'          => 'Airpod Gen 2',
            'slug'          => 'airpod-gen-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0031',
            'price'         => 5200000,
            'brand_id'      => 1,
            'author_id'     => 3,
        ],
        [
            'name'          => 'Samsung IA500',
            'slug'          => 'samsung-ia500',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0032',
            'price'         => 250000,
            'brand_id'      => 2,
            'author_id'     => 3,
        ],
        [
            'name'          => 'JBL Live Pro 2 Wireless',
            'slug'          => 'airpod-gen-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0031',
            'price'         => 5200000,
            'brand_id'      => 16,
            'author_id'     => 3,
        ],
        [
            'name'          => 'Apacer USB 2',
            'slug'          => 'apacer-usb-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0033',
            'price'         => 220000,
            'brand_id'      => 17,
            'author_id'     => 3,
        ],
        [
            'name'          => 'Sandisk USB 2',
            'slug'          => 'sandisk-usb-2',
            'sku_prefix'    => 'PRO',
            'sku_number'    => '0034',
            'price'         => 180000,
            'brand_id'      => 18,
            'author_id'     => 3,
        ],
    ], ['timestamp', 'description']),
    'option'                => update_seeder([
        [
            'value'         => 'red',
            'attribute_id'  => 1,
            'author_id'     => 1,
        ],
        [
            'value'         => 'blue',
            'attribute_id'  => 1,
            'author_id'     => 1,
        ],
        [
            'value'         => 'black',
            'attribute_id'  => 1,
            'author_id'     => 1,
        ],
        [
            'value'         => 'white',
            'attribute_id'  => 1,
            'author_id'     => 1,
        ],
        [
            'value'         => 'classic',
            'attribute_id'  => 2,
            'author_id'     => 2,
        ],
        [
            'value'         => 'standard',
            'attribute_id'  => 2,
            'author_id'     => 2,
        ],
        [
            'value'         => 'modern',
            'attribute_id'  => 2,
            'author_id'     => 2,
        ],
        [
            'value'         => 'mini',
            'attribute_id'  => 3,
            'author_id'     => 3,
        ],
        [
            'value'         => 'normal',
            'attribute_id'  => 3,
            'author_id'     => 3,
        ],
        [
            'value'         => 'large',
            'attribute_id'  => 3,
            'author_id'     => 3,
        ],
    ], ['timestamp', 'description']),
    'category'              => update_seeder([
        [
            'name'          => 'phone',
            'parent_id'     => null,
            'author_id'     => 1,
        ],
        [
            'name'          => 'smartphone',
            'parent_id'     => 1,
            'author_id'     => 1,
        ],
        [
            'name'          => 'gaming smartphone',
            'parent_id'     => 2,
            'author_id'     => 1,
        ],
        [
            'name'          => 'camera smartphone',
            'parent_id'     => 2,
            'author_id'     => 1,
        ],
        [
            'name'          => 'standard smartphone',
            'parent_id'     => 2,
            'author_id'     => 1,
        ],
        [
            'name'          => 'light smartphone',
            'parent_id'     => 2,
            'author_id'     => 1,
        ],
        [
            'name'          => 'cellphone',
            'parent_id'     => 1,
            'author_id'     => 1,
        ],
        [
            'name'          => 'laptop',
            'parent_id'     => null,
            'author_id'     => 1,
        ],
        [
            'name'          => 'gaming laptop',
            'parent_id'     => 7,
            'author_id'     => 1,
        ],
        [
            'name'          => 'graphics laptop',
            'parent_id'     => 7,
            'author_id'     => 1,
        ],
        [
            'name'          => 'office laptop',
            'parent_id'     => 7,
            'author_id'     => 1,
        ],
        [
            'name'          => 'tablet',
            'parent_id'     => 1,
            'author_id'     => 1,
        ],
        [
            'name'          => 'accessory',
            'parent_id'     => 1,
            'author_id'     => 1,
        ],
    ], ['timestamp', 'description', 'note']),
    'tag'                   => update_seeder([
        [
            'name'          => 'new',
            'author_id'     => 1,
        ],
        [
            'name'          => 'modern',
            'author_id'     => 1,
        ],
        [
            'name'          => 'classic',
            'author_id'     => 1,
        ],
        [
            'name'          => 'sales',
            'author_id'     => 1,
        ],
        [
            'name'          => 'sale off',
            'author_id'     => 1,
        ],
        [
            'name'          => 'hot',
            'author_id'     => 1,
        ],
        [
            'name'          => 'cheap',
            'author_id'     => 1,
        ],
        [
            'name'          => 'expensive',
            'author_id'     => 1,
        ],
        [
            'name'          => 'high-end',
            'author_id'     => 1,
        ],
        [
            'name'          => 'mid-range',
            'author_id'     => 1,
        ],
        [
            'name'          => 'lightweight',
            'author_id'     => 1,
        ],
    ], ['timestamp', 'description']),
    'role'                  => update_seeder([
        [
            'name'          => 'super admin',
            'author_id'     => 1,
        ],
        [
            'name'          => 'admin',
            'author_id'     => 1,
        ],
        [
            'name'          => 'creator',
            'author_id'     => 1,
        ],
        [
            'name'          => 'reviewer',
            'author_id'     => 1,
        ],
        [
            'name'          => 'viewer',
            'author_id'     => 1,
        ],
        [
            'name'          => 'vip viewer',
            'author_id'     => 1,
        ],
    ], ['timestamp', 'description']),
    'theme'                 => update_seeder([
        [
            'name'          => 'AdminLTE',
            'primary_image' => 'template.png',
            'info_images'   => '["01.png","02.png","03.png","04.png","05.png","06.png","07.png","08.png","09.png"]',
            'path'          => 'adminlte',
            'description'   => 
                '<h3>AdminLTE - Bootstrap 5 Admin Dashboard</h3>
                <br>
                <p>AdminLTE is a fully responsive administration template. Based on Bootstrap 5 framework and also the JavaScript plugins. Highly customizable and easy to use. Fits many screen resolutions from small mobile devices to large desktops.</p>
                <br/>
                <h4>Looking for Premium Templates?</h4>
                <br>
                <p>AdminLTE.io just opened a new premium templates page. Hand picked to ensure the best quality and the most affordable prices. Visit https://adminlte.io/premium for more information.</p>
                <p>AdminLTE has been carefully coded with clear comments in all of its JS, SCSS and HTML files. SCSS has been used to increase code customizability.</p>
                <br/>',
            'author_id'     => 1,
            'is_active'     => ThemeStatus::ACTIVE,
        ],
        [
            'name'          => 'KaiAdmin',
            'primary_image' => 'template.png',
            'info_images'   => '["01.png","02.png","03.png","04.png","05.png","06.png","07.png","08.png","09.png"]',
            'path'          => 'kaiadmin',
            'description'   => 
                '<h3>Kaiadmin Lite - Free Bootstrap 5 Admin Dashboard</h3>
                <br>
                <p>This time, I want to introduce you Kaiadmin Lite – a free Bootstrap 5 Admin Dashboard built to easily manage and visualize business data.</p>
                <br>
                <p>With Kaiadmin Lite, you can complete development faster with no design skills required. Save 1000s of hours of designing and coding work, as we\'ve already done that for you.</p>
                <br>
                <p>Don\'t worry about getting started – we\'ve documented how to get started using this dashboard template and utilizing the available components and plugins, making it easy to leverage the full potential of Kaiadmin Bootstrap 5 Admin Dashboard.</p>
                <br/>',
            'author_id'     => 1,
            'is_active'     => ThemeStatus::UNACTIVE,
        ]
    ], ['timestamp']),
    'theme_setting'         => [
        [
            'theme_id'          => 1,
            'author_id'         => 1,
            'sidebar_collapse'  => false,
            'menu_skin'         => 'blue',
            'sidebar_skin'      => 'black'
        ],
        [
            'theme_id'          => 2,
            'author_id'         => 1,
            'sidebar_collapse'  => false,
            'menu_skin'         => 'blue',
            'sidebar_skin'      => 'black'
        ],
    ]
];