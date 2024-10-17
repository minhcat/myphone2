<?php

return [
    'attribute'                     => 'transporter_id',
    'values'                        => [
        [
            'value'                 => null,
            'rate'                  => 0.333,
            'max'                   => 54,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'GiaoHangNhanh'
                ]
            ]
        ],
        [
            'value'                 => null,
            'rate'                  => 0.333,
            'max'                   => 54,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'VietnamPost'
                ]
            ]
        ],
        [
            'value'                 => null,
            'rate'                  => 0.334,
            'max'                   => 54,
            'conditions'            => [
                [
                    'column'        => 'name',
                    'value'         => 'J&T Express'
                ]
            ]
        ],
    ],
];