<?php

use App\Enums\ConditionType;
use App\Enums\GenerateType;

return [
    'attribute'                     => 'condition_type',
    'generate_type'                 => GenerateType::RANDOM,
    'values'                        => [
        [
            'value'                 => ConditionType::TOTAL,
            'rate'                  => 0.5,
        ],
        [
            'value'                 => ConditionType::QUANTITY,
            'rate'                  => 0.5,
        ],
    ]
];