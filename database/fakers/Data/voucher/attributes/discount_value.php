<?php

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\GenerateType;

return [
    'attribute'                     => 'discount_value',
    'generate_type'                 => GenerateType::RANDOM,
    'values'                        => [
        [
            'value'                 => 10000,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::TRANSPORT_FEE,
                ],
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::AMOUNT,
                ],
            ]
        ],
        [
            'value'                 => 20000,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::TRANSPORT_FEE,
                ],
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::AMOUNT,
                ],
            ]
        ],
        [
            'value'                 => 100,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::TRANSPORT_FEE,
                ],
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT,
                ],
            ]
        ],
        [
            'value'                 => 75,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::TRANSPORT_FEE,
                ],
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT,
                ],
            ]
        ],
        [
            'value'                 => 1000000,
            'rate'                  => 0.5,
            'conditions'            => [
                [
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::INVOICE,
                ],
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
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::INVOICE,
                ],
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
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::INVOICE,
                ],
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
                    'attribute'     => 'discount_target',
                    'value'         => DiscountTarget::INVOICE,
                ],
                [
                    'attribute'     => 'discount_type',
                    'value'         => DiscountType::PERCENT,
                ],
            ]
        ],
    ]
];
