<?php

use App\Enums\DiscountType;

return [
    'attribute'                     => 'discount_minimum',
    'values'                        => [
        [
            'value'                 => null,
            'rate'                  => 1,
            'conditions'            => [
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::AMOUNT
                ]
            ]
        ],
        [
            'value'                 => 100000,
            'rate'                  => 1,
            'conditions'            => [
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT
                ]
            ]
        ],
    ]
];