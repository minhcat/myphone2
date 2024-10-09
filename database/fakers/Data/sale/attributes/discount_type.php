<?php

use App\Enums\DiscountType;
use App\Enums\GenerateType;

return [
    'attribute'                     => 'discount_type',
    'generate_type'                 => GenerateType::RANDOM,
    'values'                        => [
        [
            'value'                 => DiscountType::AMOUNT,
            'rate'                  => 0.75
        ],
        [
            'value'                 => DiscountType::PERCENT,
            'rate'                  => 0.25
        ],
    ]
];