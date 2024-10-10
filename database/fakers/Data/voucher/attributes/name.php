<?php

return [
    'attribute'                     => 'name',
    'values'                        => add_id_to_objects(array_multiply([
        [
            'value'                 => 'Spring Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Spring Super Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Summer Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Summer Super Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Fall Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Fall Super Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Winter Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Winter Super Voucher',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Black Friday',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Company Anniversary',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
    ], 3)),
    'suffixes'                      => [
        [
            'order'                 => 1,
            'values'                => [
                [
                    'value'         => '2022',
                    'rate'          => 0.1,
                    'max'           => 1,
                ],
                [
                    'value'         => '2023',
                    'rate'          => 0.1,
                    'max'           => 1,
                ],
                [
                    'value'         => '2024',
                    'rate'          => 0.1,
                    'max'           => 1,
                ]
            ]
        ]
    ],
];