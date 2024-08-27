<?php

use App\Enums\FakerConditionType;
use App\Enums\Gender;

return [
    'attribute'                     => 'lastname',
    'values'                        => [
        // Gender Male
        [
            'value'                 => 'Huy',
            'rate'                  => 0.15,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Khang',
            'rate'                  => 0.14,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Bảo',
            'rate'                  => 0.13,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Minh',
            'rate'                  => 0.12,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Phúc',
            'rate'                  => 0.11,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Anh',
            'rate'                  => 0.09,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Khoa',
            'rate'                  => 0.08,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Phát',
            'rate'                  => 0.07,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Đạt',
            'rate'                  => 0.06,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        [
            'value'                 => 'Khôi',
            'rate'                  => 0.05,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::MALE,
                ],
            ],
        ],
        // Gender Female
        [
            'value'                 => 'Ngọc Anh',
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        [
            'value'                 => 'Kim Anh',
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        [
            'value'                 => 'Trang',
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        [
            'value'                 => 'Thanh Trang',
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        [
            'value'                 => 'Linh',
            'rate'                  => 0.2,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        [
            'value'                 => 'Thủy',
            'rate'                  => 0.2,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        [
            'value'                 => 'Hương',
            'rate'                  => 0.2,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        [
            'value'                 => 'Thảo',
            'rate'                  => 0.2,
            'conditions'            => [
                [
                    'attribute'     => 'gender',
                    'value'         => Gender::FEMALE,
                ],
            ],
        ],
        // Gender Other
        [
            'value'                 => 'Phương',
            'rate'                  => 0.2,
        ],
        [
            'value'                 => 'Tú',
            'rate'                  => 0.2,
        ],
        [
            'value'                 => 'Giang',
            'rate'                  => 0.2,
        ],
        [
            'value'                 => 'Thanh',
            'rate'                  => 0.2,
        ],
        [
            'value'                 => 'Tâm',
            'rate'                  => 0.2,
        ],
    ],
    'prefixes'                      => require database_path().'/fakers/Data/user/attributes/lastname.prefix.php'
];