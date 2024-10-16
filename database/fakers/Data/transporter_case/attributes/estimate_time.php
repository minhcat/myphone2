<?php

use App\Enums\EstimateTimeType;

return [
    'attribute'                     => 'estimate_time',
    'values'                        => [
        [
            'value'                 => 1,
            'rate'                  => 1,
            'conditions'            => [
                [
                    'attribute'     => 'estimate_time_type',
                    'value'         => EstimateTimeType::DAY,
                ],
                [
                    'attribute'     => 'name',
                    'value'         => 'Normal'
                ]
            ]
        ],
        [
            'value'                 => 3,
            'rate'                  => 1,
            'conditions'            => [
                [
                    'attribute'     => 'estimate_time_type',
                    'value'         => EstimateTimeType::DAY,
                ],
                [
                    'attribute'     => 'name',
                    'value'         => 'Cheap'
                ]
            ]
        ],
        [
            'value'                 => 3,
            'rate'                  => 1,
            'conditions'            => [
                [
                    'attribute'     => 'estimate_time_type',
                    'value'         => EstimateTimeType::HOUR,
                ],
            ]
        ],
    ],
];