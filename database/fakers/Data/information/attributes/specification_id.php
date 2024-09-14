<?php

return [
    'attribute'                     => 'specification_id',
    'values'                        => [
        [
            'value'                 => null,
            'max'                   => 10,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'CPU'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 5,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'RAM'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 4,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Hard disk'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 5,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Graphics card'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 4,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'OS'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 5,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Screen'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 8,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Battery'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 7,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Weight'
                ]
            ]
        ],
    ],
];