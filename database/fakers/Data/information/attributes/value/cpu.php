<?php

return uncompress([
    'value'             => [
        'Core I3',
        'Core I5',
        'Core I7',
        'Apple A15 Bionic',
        'Apple A16 Bionic',
        'Apple A17 Pro',
        'Snapdragon 7',
        'Snapdragon 8',
        'MediaTek Helio A',
        'MediaTek Helio G',
    ],
    'rate'              => 0.1,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'CPU'
        ]
    ]
]);
