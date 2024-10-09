<?php

use App\Enums\DiscountType;

return [
    'attribute'                     => 'discount_value',
    'values'                        => [
        [
            'value'                 => 1000000,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::AMOUNT,
                ],
            ]
        ],
        [
            'value'                 => 2000000,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::AMOUNT,
                ],
            ]
        ],
        [
            'value'                 => 10,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT,
                ],
            ]
        ],
        [
            'value'                 => 20,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT,
                ],
            ]
        ],
    ]
];