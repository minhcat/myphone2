<?php

return [
    'attribute'                     => 'range',
    'auto_generate'                 => false,
    'values'                        => [
        [
            'id'                    => 1,
            'value'                 => '[0,1000000)',
            'rate'                  => 0.333,
            'max'                   => 1
        ],
        [
            'id'                    => 2,
            'value'                 => '[1000000,5000000)',
            'rate'                  => 0.333,
            'max'                   => 1
        ],
        [
            'id'                    => 3,
            'value'                 => '[5000000,inf)',
            'rate'                  => 0.334,
            'max'                   => 1
        ],
    ],
];