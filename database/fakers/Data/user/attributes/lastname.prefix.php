<?php

use App\Enums\FakerConditionType;
use App\Enums\Gender;

return [
    [
        'order'                     => 1,
        'values'                    => [
            [
                'value'                 => null,
                'rate'                  => 0.05,
            ],
            [
                'value'                 => 'Gia',
                'rate'                  => 0.25,
                'withs'                 => [
                    [
                        'value'         => 'Huy',
                        'rate'          => 0.5
                    ],
                    [
                        'value'         => 'Bảo',
                        'rate'          => 0.5
                    ],
                    [
                        'value'         => 'Đạt',
                        'rate'          => 0.5
                    ],
                ],
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::MALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Văn',
                'rate'                  => 0.2,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::MALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Quốc',
                'rate'                  => 0.2,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::MALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Đức',
                'rate'                  => 0.2,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::MALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Mạnh',
                'rate'                  => 0.2,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::MALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Minh',
                'rate'                  => 0.1,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::MALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Hoàng',
                'rate'                  => 0.1,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::MALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Ngọc',
                'rate'                  => 0.2,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::FEMALE,
                    ],
                    [
                        'attribute'     => 'lastname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Ngọc Anh',
                    ],
                ],
            ],
            [
                'value'                 => 'Bích',
                'rate'                  => 0.2,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::FEMALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Diễm',
                'rate'                  => 0.1,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::FEMALE,
                    ],
                ],
            ],
            [
                'value'                 => 'Kim',
                'rate'                  => 0.2,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::FEMALE,
                    ],
                    [
                        'attribute'     => 'lastname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Kim Anh',
                    ],
                ],
            ],
            [
                'value'                 => 'Hồng',
                'rate'                  => 0.1,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => [Gender::FEMALE, Gender::OTHER],
                    ],
                ],
            ],
            [
                'value'                 => 'Thanh',
                'rate'                  => 0.1,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => [Gender::FEMALE, Gender::OTHER],
                    ],
                ],
            ],
        ]
    ],
    [
        'order'                         => 2,
        'values'                        => [
            [
                'value'                 => null,
                'rate'                  => 0.7,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::FEMALE,
                    ],
                ]
            ],
            [
                'value'                 => 'Thị',
                'rate'                  => 0.3,
                'conditions'            => [
                    [
                        'attribute'     => 'gender',
                        'value'         => Gender::FEMALE,
                    ],
                ]
            ],
        ]
    ],
];