<?php

use App\Enums\EstimateTimeType;

return [
    'attribute'                     => 'estimate_time_type',
    'values'                        => [
        [
            'value'                 => EstimateTimeType::DAY,
            'rate'                  => 1,
            'max'                   => 6,
            'conditions'            => [
                [
                    'attribute'     => 'name',
                    'value'         => ['Normal', 'Cheap'],
                ]
            ]
        ],
        [
            'value'                 => EstimateTimeType::HOUR,
            'rate'                  => 1,
            'max'                   => 3,
            'conditions'            => [
                [
                    'attribute'     => 'name',
                    'value'         => 'Fast'
                ]
            ]
        ],
    ],
];