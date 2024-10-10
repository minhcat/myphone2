<?php

use App\Enums\DiscountTarget;
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
            'value'                 => 50000,
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
            'value'                 => 500000,
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