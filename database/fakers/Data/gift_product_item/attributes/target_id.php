<?php

use App\Enums\GenerateType;

return [
    'attribute'                     => 'target_id',
    'generate_type'                 => GenerateType::RANDOM,
    'values'                        => [
        [
            'value'                 => null,
            'max'                   => 1,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Airpod Gen 2'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 1,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Samsung IA500'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 1,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'JBL Live Pro 2 Wireless'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 1,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Apacer USB 2'
                ]
            ]
        ],
        [
            'value'                 => null,
            'max'                   => 1,
            'rate'                  => 0.1,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'Sandisk USB 2'
                ]
            ]
        ],
    ]
];