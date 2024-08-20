<?php

use App\Enums\FakerConditionType;
use App\Enums\Gender;

return [
    'user'                                  => [
        [
            'attribute'                     => 'gender',
            'values'                        => [
                [
                    'value'                 => Gender::MALE,
                    'rate'                  => 0.475
                ],
                [
                    'value'                 => Gender::FEMALE,
                    'rate'                  => 0.475
                ],
                [
                    'value'                 => Gender::OTHER,
                    'rate'                  => 0.05
                ],
            ],
        ],
        [
            'attribute'                     => 'firstname',
            'values'                        => [
                [
                    'value'                 => 'Nguyễn',
                    'rate'                  => 0.384,
                ],
                [
                    'value'                 => 'Trần',
                    'rate'                  => 0.121,
                ],
                [
                    'value'                 => 'Lê',
                    'rate'                  => 0.095,
                ],
                [
                    'value'                 => 'Phạm',
                    'rate'                  => 0.07,
                ],
                [
                    'value'                 => 'Hoàng',
                    'rate'                  => 0.026,
                ],
                [
                    'value'                 => 'Huỳnh',
                    'rate'                  => 0.025,
                ],
                [
                    'value'                 => 'Phan',
                    'rate'                  => 0.045,
                ],
                [
                    'value'                 => 'Vũ',
                    'rate'                  => 0.02,
                ],
                [
                    'value'                 => 'Võ',
                    'rate'                  => 0.019,
                ],
                [
                    'value'                 => 'Đặng',
                    'rate'                  => 0.021,
                ],
                [
                    'value'                 => 'Bùi',
                    'rate'                  => 0.02,
                ],
                [
                    'value'                 => 'Đỗ',
                    'rate'                  => 0.014,
                ],
                [
                    'value'                 => 'Hồ',
                    'rate'                  => 0.013,
                ],
                [
                    'value'                 => 'Ngô',
                    'rate'                  => 0.013,
                ],
                [
                    'value'                 => 'Dương',
                    'rate'                  => 0.01,
                ],
                [
                    'value'                 => 'Lý',
                    'rate'                  => 0.01,
                ],
                [
                    'value'                 => 'Đinh',
                    'rate'                  => 0.01,
                ],
                [
                    'value'                 => 'Tôn',
                    'rate'                  => 0.01,
                ],
                [
                    'value'                 => 'Hà',
                    'rate'                  => 0.01,
                ],
                [
                    'value'                 => 'Trịnh',
                    'rate'                  => 0.01,
                ],
                [
                    'value'                 => 'Tạ',
                    'rate'                  => 0.06,
                ],
            ],
            'suffixes'                      => [
                [
                    'value'                 => null,
                    'rate'                  => 0.7,
                ],
                [
                    'value'                 => 'Trần',
                    'rate'                  => 0.05,
                    'conditions'            => [
                        [
                            'attribute'     => 'firstname',
                            'type'          => FakerConditionType::NOT_EQUAL,
                            'value'         => 'Trần',
                        ],
                    ],
                ],
                [
                    'value'                 => 'Phạm',
                    'rate'                  => 0.05,
                    'conditions'            => [
                        [
                            'attribute'     => 'firstname',
                            'type'          => FakerConditionType::NOT_EQUAL,
                            'value'         => 'Phạm',
                        ],
                    ],
                ],
                [
                    'value'                 => 'Vũ',
                    'rate'                  => 0.05,
                    'conditions'            => [
                        [
                            'attribute'     => 'firstname',
                            'type'          => FakerConditionType::NOT_EQUAL,
                            'value'         => 'Vũ',
                        ],
                    ],
                ],
                [
                    'value'                 => 'Lưu',
                    'rate'                  => 0.05,
                    'conditions'            => [
                        [
                            'attribute'     => 'firstname',
                            'type'          => FakerConditionType::NOT_EQUAL,
                            'value'         => 'Lưu',
                        ],
                    ],
                ],
                [
                    'value'                 => 'Quách',
                    'rate'                  => 0.05,
                    'conditions'            => [
                        [
                            'attribute'     => 'firstname',
                            'type'          => FakerConditionType::NOT_EQUAL,
                            'value'         => 'Quách',
                        ],
                    ],
                ],
                [
                    'value'                 => 'Nguyễn',
                    'rate'                  => 0.05,
                    'conditions'            => [
                        [
                            'attribute'     => 'firstname',
                            'type'          => FakerConditionType::NOT_EQUAL,
                            'value'         => 'Nguyễn',
                        ],
                    ],
                ],
            ],
        ],
        [
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
            'prefixes'                      => [
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
                    'value'                 => 'Thị',
                    'rate'                  => 0.2,
                    'conditions'            => [
                        [
                            'attribute'     => 'gender',
                            'value'         => Gender::FEMALE,
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
                    'rate'                  => 0.2,
                    'conditions'            => [
                        [
                            'attribute'     => 'gender',
                            'value'         => [Gender::FEMALE, Gender::OTHER],
                        ],
                    ],
                ],
            ],
        ],
        [
            'attribute'                     => 'job',
            'values'                        => [
                [
                    'value'                 => 'developer',
                    'rate'                  => 0.2
                ],
                [
                    'value'                 => 'reviewer',
                    'rate'                  => 0.2
                ],
                [
                    'value'                 => 'tester',
                    'rate'                  => 0.2
                ],
                [
                    'value'                 => 'entry staff',
                    'rate'                  => 0.2
                ],
                [
                    'value'                 => 'leader',
                    'rate'                  => 0.2
                ],
            ],
        ],
        [
            'attribute'                     => 'account',
            'values'                        => []
        ],
        [
            'attribute'                     => 'email',
            'values'                        => []
        ],
    ],
];