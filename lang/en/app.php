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
                'invoice_quantity'  => 'invoice quantity',
                'invoice_total'     => 'invoice total',
                'variant'           => 'variant',
                'product'           => 'product',
                'product_group'     => 'product group',
                'category'          => 'category',
                'tag'               => 'tag',
            ],
            'label'                 => [
                'invoice_quantity'  => 'info',
                'invoice_total'     => 'primary',
                'variant'           => 'success',
                'product'           => 'success',
                'product_group'     => 'warning',
                'category'          => 'danger',
                'tag'               => 'default',
            ],
        ],
        'condition_target_type'     => [
            'name'                  => [
                'variant'           => 'variant',
                'product'           => 'product',
                'product_group'     => 'product group',
                'category'          => 'category',
                'tag'               => 'tag',
            ],
            'label'                 => [
                'variant'           => 'success',
                'product'           => 'success',
                'product_group'     => 'warning',
                'category'          => 'danger',
                'tag'               => 'default',
            ],
        ],
        'discount_target'           => [
            'name'                  => [
                'invoice'           => 'invoice',
                'product'           => 'product',
                'transport_fee'     => 'transport_fee',
            ],
            'label'                 => [
                'invoice'           => 'info',
                'product'           => 'primary',
                'transport_fee'     => 'success',
            ],
        ],
        'discount_type'             => [
            'name'                  => [
                'amount'            => 'amount',
                'percent'           => 'percent',
            ],
            'value'                 => [
                'amount'            => 'primary',
                'percent'           => 'success',
            ],
        ],
    ],
];