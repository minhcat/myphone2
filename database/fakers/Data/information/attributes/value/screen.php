<?php

return uncompress([
    'value'             => [
        '2.5 inch',
        '6.7 inch',
        '13 inch',
        '14 inch',
        '15 inch',
    ],
    'rate'              => 0.2,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'Screen'
        ]
    ]
]);
