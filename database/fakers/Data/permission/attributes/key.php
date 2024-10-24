<?php

return [
    'attribute'                     => 'key',
    'values'                        => [
        [
            'value'                 => 'area',
            'max'                   => 5,
        ],
        [
            'value'                 => 'area_detail',
            'max'                   => 5,
        ],
        [
            'value'                 => 'attribute',
            'max'                   => 5,
        ],
        [
            'value'                 => 'attribute_option',
            'max'                   => 5,
        ],
        [
            'value'                 => 'brand',
            'max'                   => 5,
        ],
        [
            'value'                 => 'cart',  //
            'max'                   => 6,
        ],
        [
            'value'                 => 'cart_detail',
            'max'                   => 5,
        ],
        [
            'value'                 => 'category',
            'max'                   => 5,
        ],
        [
            'value'                 => 'city',
            'max'                   => 5,
        ],
        [
            'value'                 => 'city_district',
            'max'                   => 5,
        ],
        [
            'value'                 => 'city_district_ward',
            'max'                   => 5,
        ],
        [
            'value'                 => 'gift',  //
            'max'                   => 6,
        ],
        [
            'value'                 => 'gift_product',
            'max'                   => 5,
        ],
        [
            'value'                 => 'gift_product_item',
            'max'                   => 5,
        ],
        [
            'value'                 => 'invoice',
            'max'                   => 5,
        ],
        [
            'value'                 => 'invoice_detail',
            'max'                   => 5,
        ],
        [
            'value'                 => 'order', //
            'max'                   => 6,
        ],
        [
            'value'                 => 'order_detail',
            'max'                   => 5,
        ],
        [
            'value'                 => 'permission',
            'max'                   => 5,
        ],
        [
            'value'                 => 'product',
            'max'                   => 5,
        ],
        [
            'value'                 => 'product_variation',
            'max'                   => 5,
        ],
        [
            'value'                 => 'product_detail',
            'max'                   => 5,
        ],
        [
            'value'                 => 'promotion', //
            'max'                   => 6,
        ],
        [
            'value'                 => 'role',
            'max'                   => 5,
        ],
        [
            'value'                 => 'sale',
            'max'                   => 6,
        ],
        [
            'value'                 => 'sale_product',
            'max'                   => 5,
        ],
        [
            'value'                 => 'specification',
            'max'                   => 5,
        ],
        [
            'value'                 => 'specification_information',
            'max'                   => 5,
        ],
        [
            'value'                 => 'tag',
            'max'                   => 5,
        ],
        [
            'value'                 => 'transporter',
            'max'                   => 5,
        ],
        [
            'value'                 => 'transporter_case',
            'max'                   => 5,
        ],
        [
            'value'                 => 'transport_fee',
            'max'                   => 5,
        ],
        [
            'value'                 => 'user',
            'max'                   => 5,
        ],
        [
            'value'                 => 'user_address',
            'max'                   => 5,
        ],
        [
            'value'                 => 'voucher',   //
            'max'                   => 6,
        ],
        [
            'value'                 => 'voucher_code',
            'max'                   => 5,
        ],
    ],
    'suffixes'                      => [
        [
            'order'                 => 1,
            'values'                => [
                [
                    'value'         => ':browse',
                    'space'         => false,
                    'max'           => 1,
                ],
                [
                    'value'         => ':read',
                    'space'         => false,
                    'max'           => 1,
                ],
                [
                    'value'         => ':add',
                    'space'         => false,
                    'max'           => 1,
                ],
                [
                    'value'         => ':edit',
                    'space'         => false,
                    'max'           => 1,
                ],
                [
                    'value'         => ':delete',
                    'space'         => false,
                    'max'           => 1,
                ],
                [
                    'value'         => ':approve',
                    'space'         => false,
                    'max'           => 1,
                    'withs'         => [
                        [
                            'value' => 'order',
                            'rate'  => 1,
                        ],
                        [
                            'value' => 'promotion',
                            'rate'  => 1,
                        ],
                        [
                            'value' => 'sale',
                            'rate'  => 1,
                        ],
                        [
                            'value' => 'gift',
                            'rate'  => 1,
                        ],
                        [
                            'value' => 'voucher',
                            'rate'  => 1,
                        ],
                    ]
                ],
                [
                    'value'         => ':order',
                    'space'         => false,
                    'max'           => 1,
                    'withs'         => [
                        [
                            'value' => 'cart',
                            'rate'  => 1,
                        ]
                    ]
                ],
            ]
        ]
    ],
];