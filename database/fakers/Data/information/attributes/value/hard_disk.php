<?php

return uncompress([
    'value'             => [
        '128 GB',
        '256 GB',
        '512 GB',
        '1 TB',
    ],
    'rate'              => 0.25,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'Hard disk'
        ]
    ]
]);
