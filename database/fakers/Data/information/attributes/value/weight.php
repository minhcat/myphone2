<?php

return uncompress([
    'value'             => [
        '100 g',
        '150 g',
        '200 g',
        '220 g',
        '1.7 kg',
        '2.3 kg',
        '3.5 kg',
    ],
    'rate'              => 0.1428,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'Weight'
        ]
    ]
]);
