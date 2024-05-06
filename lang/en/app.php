<?php

return [
    'enums'                 => [
        'gender'            => [
            'name'          => [
                'male'      => 'male',
                'female'    => 'female',
                'other'     => 'other',
            ],
            'label'         => [
                'male'      => 'primary',
                'female'    => 'success',
                'other'     => 'secondary',
            ],
        ],
        'order_status'      => [
            'name'          => [
                'pending'   => 'pending',
                'approved'  => 'approved',
                'shipping'  => 'shipping',
                'completed' => 'completed',
                'cancelled' => 'cancelled',
            ],
            'label'         => [
                'pending'   => 'primary',
                'approved'  => 'success',
                'shipping'  => 'warning',
                'completed' => 'info',
                'cancelled' => 'danger',
            ],
        ],
    ],
];