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
];