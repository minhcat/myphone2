<?php

return [
    'gender'                    => [
        'name'                  => [
            'male'              => 'male',
            'female'            => 'female',
            'other'             => 'other',
        ],
        'label'                 => [
            'male'              => 'primary',
            'female'            => 'success',
            'other'             => 'default',
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
            'pending'           => 'fa fa-thumbs-up',
            'approved'          => 'fa fa-thumbs-down',
            'inprogress'        => 'fa fa-stop',
            'end'               => 'fa fa-play',
        ],
        'action'                => [
            'raw'               => null,
            'pending'           => 'Approve',
            'approved'          => 'Unapprove',
            'inprogress'        => 'Stop',
            'end'               => 'Restart',
        ],
        'action_label'          => [
            'raw'               => 'default',
            'pending'           => 'success',
            'approved'          => 'warning',
            'inprogress'        => 'danger',
            'end'               => 'info',
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
    'target_type'               => [
        'name'                  => [
            'product'           => 'product',
            'variant'           => 'variant',
        ],
        'label'                 => [
            'product'           => 'primary',
            'variant'           => 'success',
        ],
    ],
    'territory_type'            => [
        'name'                  => [
            'city'              => 'city',
            'district'          => 'district',
            'ward'              => 'ward',
        ],
        'label'                 => [
            'city'              => 'primary',
            'district'          => 'success',
            'ward'              => 'warning',
        ],
    ],
    'estimate_time_type'        => [
        'name'                  => [
            'hour'              => 'hour',
            'day'               => 'day',
        ],
        'label'                 => [
            'hour'              => 'primary',
            'day'               => 'success',
        ],
    ],
];