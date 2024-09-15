<?php

return uncompress([
    'value'             => [
        'iOS',
        'Android',
        'Windows 10',
        'Ubuntu',
    ],
    'rate'              => 0.25,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'OS'
        ]
    ]
]);
