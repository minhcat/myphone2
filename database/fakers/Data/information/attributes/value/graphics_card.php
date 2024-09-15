<?php

return uncompress([
    'value'             => [
        'Apple GPU',
        'Adreno 740',
        'Mali G52',
        'Intel UHD Graphics',
        'Intel Iris Xe Graphics',
    ],
    'rate'              => 0.2,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'Graphics card'
        ]
    ]
]);

