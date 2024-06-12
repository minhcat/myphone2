<?php

return [
    'enums'                         => [
        'gender'                    => [
            'name'                  => [
                'male'              => 'male',
                'female'            => 'female',
                'other'             => 'other',
            ],
            'label'                 => [
                'male'              => 'primary',
                'female'            => 'success',
                'other'             => 'secondary',
            ],
        ],
        'order_status'              => [
            'name'                  => [
                'pending'           => 'pending',
                'approved'          => 'approved',
                'shipping'          => 'shipping',
                'completed'         => 'completed',
                'cancelled'         => 'cancelled',
            ],
            'label'                 => [
                'pending'           => 'primary',
                'approved'          => 'success',
                'shipping'          => 'warning',
                'completed'         => 'info',
                'cancelled'         => 'danger',
            ],
        ],
        'promotion_status'          => [
            'name'                  => [
                'raw'               => 'raw',
                'pending'           => 'pending',
                'approved'          => 'approved',
                'inprogress'        => 'inprogress',
                'end'               => 'end'
            ],
            'label'                 => [
                'raw'               => 'default',
                'pending'           => 'info',
                'approved'          => 'success',
                'inprogress'        => 'primary',
                'end'               => 'danger',
            ],
            'icon'                  => [
                'raw'               => 'fa fa-wrench',
                'pending'           => 'fa fa-hourglass',
                'approved'          => 'fa fa-thumbs-up',
                'inprogress'        => 'fa fa-play',
                'end'               => 'fa fa-stop',
            ],
            'action'                => [
                'raw'               => null,
                'pending'           => 'Approve',
                'approved'          => null,
                'inprogress'        => 'Stop',
                'end'               => null,
            ],
        ],
        'condition_type'            => [
            'name'                  => [
                'quantity'          => 'quantity',
                'total'             => 'total',
            ],
            'label'                 => [
                'quantity'          => 'success',
                'total'             => 'primary',
            ],
        ],
        'discount_target'           => [
            'name'                  => [
                'invoice'           => 'invoice',
                'transport_fee'     => 'transport fee',
            ],
            'label'                 => [
                'invoice'           => 'primary',
                'transport_fee'     => 'success',
            ],
        ],
        'discount_type'             => [
            'name'                  => [
                'amount'            => 'amount',
                'percent'           => 'percent',
            ],
            'label'                 => [
                'amount'            => 'primary',
                'percent'           => 'success',
            ],
        ],
    ],
];