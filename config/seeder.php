<?php

use App\Enums\Gender;

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
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 1,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Samsung',   // id=2
            'country'       => 'korea',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 1,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Xiaomi',    // id=3
            'country'       => 'china',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 1,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'OPPO',      // id=4
            'country'       => 'china',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 1,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Vsmart',    // id=5
            'country'       => 'vietnam',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 1,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Realme',    // id=6
            'country'       => 'china',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 2,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Nokia',     // id=7
            'country'       => 'finland',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 2,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Vivo',      // id=8
            'country'       => 'china',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 2,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Dell',      // id=9
            'country'       => 'usa',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 2,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Asus',      // id=10
            'country'       => 'taiwan',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 2,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Mobell',    // id=11
            'country'       => 'singapore',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 3,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Itel',      // id=12
            'country'       => 'china',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 3,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Masstel',   // id=13
            'country'       => 'vietname',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 3,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Acer',   // id=13
            'country'       => 'taiwan',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 3,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
        [
            'name'          => 'Lenovo',   // id=13
            'country'       => 'china',
            'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sint perspiciatis et commodi placeat accusamus!',
            'author_id'     => 3,
            'note'          => 'Lorem ipsum dolor sit amet?',
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ],
    ],
];