<?php

return [
    'attribute'                     => 'name',
    'values'                        => add_id_to_objects(array_multiply([
        [
            'value'                 => 'Spring Sale Off',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Spring Super Sale Off',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Summer Sale Off',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Summer Super Sale Off',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Fall Sale Off',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Fall Super Sale Off',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Winter Sale Off',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Winter Super Sale Off',
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