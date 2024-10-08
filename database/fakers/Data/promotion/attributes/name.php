<?php

return [
    'attribute'                     => 'name',
    'values'                        => add_id_to_objects(array_multiply([
        [
            'value'                 => 'Spring Sale',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Spring Super Sale',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Summer Sale',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Summer Super Sale',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Fall Sale',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Fall Super Sale',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Winter Sale',
            'rate'                  => 0.1,
            'max'                   => 1,
        ],
        [
            'value'                 => 'Winter Super Sale',
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