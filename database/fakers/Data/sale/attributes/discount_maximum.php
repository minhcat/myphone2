<?php

use App\Enums\DiscountType;

return [
    'attribute'                     => 'discount_maximum',
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
            'value'                 => 5000000,
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