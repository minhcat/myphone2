<?php

return uncompress([
    'value'             => [
        '1200 mAh',
        '1500 mAh',
        '2000 mAh li-ion',
        '3000 mAh li-ion',
        '4000 mAh li-ion',
        '3 cell li-ion, 50wh',
        '5 cell li-ion, 70wh',
        '7 cell li-ion, 100wh'
    ],
    'rate'              => 0.125,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'Battery'
        ]
    ]
]);
