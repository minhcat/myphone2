<?php

use App\Enums\DiscountTarget;
use App\Enums\GenerateType;

return [
    'attribute'                     => 'discount_target',
    'generate_type'                 => GenerateType::RANDOM,
    'values'                        => [
        [
            'value'                 => DiscountTarget::INVOICE,
            'rate'                  => 0.75,
        ],
        [
            'value'                 => DiscountTarget::TRANSPORT_FEE,
            'rate'                  => 0.25,
        ],
    ]
];