<?php

use App\Enums\DiscountTarget;
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
            'value'                 => 10000,
            'rate'                  => 1,
            'conditions'            => [
                [
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::TRANSPORT_FEE
                ],
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT
                ]
            ]
        ],
        [
            'value'                 => 100000,
            'rate'                  => 1,
            'conditions'            => [
                [
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::INVOICE
                ],
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT
                ]
            ]
        ],
    ]
];