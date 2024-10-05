<?php

use App\Enums\OrderStatus;

return [
    'attribute'                     => 'status',
    'values'                        => [
        [
            'value'                 => OrderStatus::PENDING,
            'max'                   => 1000,
            'rate'                  => 0.2,
        ],
        [
            'value'                 => OrderStatus::APPROVED,
            'max'                   => 1000,
            'rate'                  => 0.2,
        ],
        [
            'value'                 => OrderStatus::SHIPPING,
            'max'                   => 1000,
            'rate'                  => 0.2,
        ],
        [
            'value'                 => OrderStatus::COMPLETED,
            'max'                   => 1000,
            'rate'                  => 0.2,
        ],
        [
            'value'                 => OrderStatus::CANCELLED,
            'max'                   => 1000,
            'rate'                  => 0.2,
        ],
    ]
];