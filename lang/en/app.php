<?php

return [
    'enums'                     => [
        'gender'                => [
            'name'              => [
                'male'          => 'male',
                'female'        => 'female',
                'other'         => 'other',
            ],
            'label'             => [
                'male'          => 'primary',
                'female'        => 'success',
                'other'         => 'secondary',
            ],
        ],
        'order_status'          => [
            'name'              => [
                'pending'       => 'pending',
                'approved'      => 'approved',
                'shipping'      => 'shipping',
                'completed'     => 'completed',
                'cancelled'     => 'cancelled',
            ],
            'label'             => [
                'pending'       => 'primary',
                'approved'      => 'success',
                'shipping'      => 'warning',
                'completed'     => 'info',
                'cancelled'     => 'danger',
            ],
        ],
        'promotion_status'      => [
            'name'              => [
                'raw'           => 'raw',
                'pending'       => 'pending',
                'approved'      => 'approved',
                'end'           => 'danger'
            ],
            'label'             => [
                'raw'           => 'default',
                'pending'       => 'primary',
                'approved'      => 'success',
                'end'           => 'danger',
            ],
        ],
        'discount_target'       => [
            'name'              => [
                'invoice'       => 'invoice',
                'product'       => 'product',
                'transport_fee' => 'transport_fee',
            ],
            'label'             => [
                'invoice'       => 'info',
                'product'       => 'primary',
                'transport_fee' => 'success',
            ],
        ],
        'discount_type'         => [
            'name'              => [
                'amount'        => 'amount',
                'percent'       => 'percent',
            ],
            'value'             => [
                'amount'        => 'primary',
                'percent'       => 'success',
            ],
        ],
    ],
];