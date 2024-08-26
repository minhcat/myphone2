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
    'address'                               => [
        [
            'attribute'                     => 'content',
            'values'                        => [
                [
                    'value'                 => 'Phạm Văn Đồng',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Điện Biên Phủ',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Đinh Bộ Lĩnh',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Nguyễn Thị Minh Khai',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Trường Chinh',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Quang Trung',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Hiệp Bình',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Phan Văn Trị',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Phạm Ngũ Lão',
                    'rate'                  => 0.1
                ],
                [
                    'value'                 => 'Nguyễn Hữu Cảnh',
                    'rate'                  => 0.1
                ],
            ]
        ],
        [
            'attribute'                     => 'ward_id',
            'values'                        => []
        ],
        [
            'attribute'                     => 'author_id',
            'values'                        => []
        ],
    ],
    'product'                               => [
        [
            'attribute'                     => 'brand_id',
            'values'                        => []
        ],
        [
            'attribute'                     => 'brand_name',
            'values'                        => []
        ],
        [
            'attribute'                     => 'name',
            'values'                        => [
                [
                    'value'                 => 'Iphone',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Apple'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Samsung Galaxy',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Samsung'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Xiaomi',
                    'rate'                  => 0.5,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Xiaomi'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Xiaomi Redmi',
                    'rate'                  => 0.5,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Xiaomi'
                        ],
                    ],
                ],
                [
                    'value'                 => 'OPPO',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'OPPO'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Vivo',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Vivo'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Realme',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Realme'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Nokia',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Nokia'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Mobell',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Mobell'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Vsmart',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Vsmart'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Masstel',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Masstel'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Dell',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Dell'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Asus',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Asus'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Lenovo',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Lenovo'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Acer',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Acer'
                        ],
                    ],
                ],
                [
                    'value'                 => 'Itel',
                    'rate'                  => 1,
                    'conditions'            => [
                        [
                            'attribute'     => 'brand_name',
                            'value'         => 'Itel'
                        ],
                    ],
                ],
            ],
            'suffixes'                      => [
                [
                    'value'                 => '11',
                    'rate'                  => 0.2,
                    'withs'                 => [
                        [
                            'value'         => 'Iphone',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '11 Promax',
                    'rate'                  => 0.2,
                    'withs'                 => [
                        [
                            'value'         => 'Iphone',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '13',
                    'rate'                  => 0.2,
                    'withs'                 => [
                        [
                            'value'         => 'Iphone',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '13 Promax',
                    'rate'                  => 0.2,
                    'withs'                 => [
                        [
                            'value'         => 'Iphone',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '15',
                    'rate'                  => 0.1,
                    'withs'                 => [
                        [
                            'value'         => 'Iphone',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'S23',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Samsung Galaxy',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'S23 Ultra',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Samsung Galaxy',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Z Fold6',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Samsung Galaxy',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Z Flip6',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Samsung Galaxy',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '13',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Xiaomi Redmi',
                            'rate'          => 1
                        ],
                        [
                            'value'         => 'Xiaomi',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Note 13',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Xiaomi Redmi',
                            'rate'          => 1
                        ],
                        [
                            'value'         => 'Xiaomi',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Note 13 Pro',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Xiaomi Redmi',
                            'rate'          => 1
                        ],
                        [
                            'value'         => 'Xiaomi',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '14 Ultra',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Xiaomi Redmi',
                            'rate'          => 1
                        ],
                        [
                            'value'         => 'Xiaomi',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Find X5',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'OPPO',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Find X5 Pro',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'OPPO',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Find X6 Pro',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'OPPO',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Reno 12',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'OPPO',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'V25e',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vivo',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'X100',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vivo',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Y28',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vivo',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Y03',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vivo',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '10',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Realme',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'C65',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Realme',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Note 50',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Realme',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'C60',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Realme',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'G22',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Nokia',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'C32',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Nokia',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '3210',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Nokia',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => '220',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Nokia',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Joy 4',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vsmart',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Star 4',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vsmart',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Bee 3',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vsmart',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Aris',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Vsmart',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'ROG Phone 6',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Asus',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'ROG Phone 8',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Asus',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Zenfone 10',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Asus',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Zenfone 11 Ultra',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Asus',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'L6502',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Itel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'S23',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Itel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'RS4',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Itel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'it2600',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Itel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'F309',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Mobell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'F209',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Mobell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Rock 4',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Mobell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'M331',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Mobell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Fami 50',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Masstel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'IZI T6',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Masstel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'IZI 10',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Masstel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Lux 10',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Masstel',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Aspire 5 Gaming',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Acer',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Aspire 6 Gaming',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Acer',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Aspire Lite 15',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Acer',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Aspire Nitro 5',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Acer',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Inspiron 15',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Dell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Vostro 15',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Dell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Precision 16',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Dell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Latitude 3440',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Dell',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Ideapad Slim 3',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Lenovo',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'LOQ 15',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Lenovo',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Thinkpad Gen 4',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Lenovo',
                            'rate'          => 1
                        ],
                    ]
                ],
                [
                    'value'                 => 'Legion 5',
                    'rate'                  => 0.25,
                    'withs'                 => [
                        [
                            'value'         => 'Lenovo',
                            'rate'          => 1
                        ],
                    ]
                ],
            ],
        ],
        [
            'attribute'                     => 'slug',
            'values'                        => []
        ],
        [
            'attribute'                     => 'sku_prefix',
            'values'                        => [
                [
                    'value'                 => 'PRO',
                    'rate'                  => 1
                ]
            ]
        ],
        [
            'attribute'                     => 'sku_number',
            'values'                        => []
        ],
        [
            'attribute'                     => 'author_id',
            'values'                        => []
        ],
    ],
];