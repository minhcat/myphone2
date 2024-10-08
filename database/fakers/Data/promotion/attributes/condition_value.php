<?php

use App\Enums\ConditionType;
use App\Enums\GenerateType;

return [
    'attribute'                     => 'condition_value',
    'generate_type'                 => GenerateType::RANDOM,
    'values'                        => [
        [
            'value'                 => 1000000,
            'rate'                  => 0.166,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::TOTAL
                ]
            ]
        ],
        [
            'value'                 => 2000000,
            'rate'                  => 0.166,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::TOTAL
                ]
            ]
        ],
        [
            'value'                 => 5000000,
            'rate'                  => 0.166,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::TOTAL
                ]
            ]
        ],
        [
            'value'                 => 10000000,
            'rate'                  => 0.166,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::TOTAL
                ]
            ]
        ],
        [
            'value'                 => 20000000,
            'rate'                  => 0.166,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::TOTAL
                ]
            ]
        ],
        [
            'value'                 => 50000000,
            'rate'                  => 0.166,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::TOTAL
                ]
            ]
        ],
        [
            'value'                 => 5,
            'rate'                  => 0.25,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::QUANTITY
                ]
            ]
        ],
        [
            'value'                 => 8,
            'rate'                  => 0.25,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::QUANTITY
                ]
            ]
        ],
        [
            'value'                 => 10,
            'rate'                  => 0.25,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::QUANTITY
                ]
            ]
        ],
        [
            'value'                 => 12,
            'rate'                  => 0.25,
            'conditions'            => [
                [
                    'attribute'     => 'condition_type',
                    'value'         => ConditionType::QUANTITY
                ]
            ]
        ],
    ]
];