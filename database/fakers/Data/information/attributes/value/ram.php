<?php

return uncompress([
    'value'             => [
        '1 GB',
        '2 GB',
        '4 GB',
        '8 GB',
        '16 GB',
    ],
    'rate'              => 0.2,
    'max'               => 1,
    'conditions'        => [
        [
            'attribute' => 'specification_name',
            'value'     => 'RAM'
        ]
    ]
]);

// return [
//     [
//         'value'             => '1 GB',
//         'rate'              => 0.2,
//         'max'               => 1,
//         'conditions'        => [
//             [
//                 'attribute' => 'specification_name',
//                 'value'     => 'RAM'
//             ]
//         ]
//     ],
//     [
//         'value'             => '2 GB',
//         'rate'              => 0.2,
//         'max'               => 1,
//         'conditions'        => [
//             [
//                 'attribute' => 'specification_name',
//                 'value'     => 'RAM'
//             ]
//         ]
//     ],
//     [
//         'value'             => '4 GB',
//         'rate'              => 0.2,
//         'max'               => 1,
//         'conditions'        => [
//             [
//                 'attribute' => 'specification_name',
//                 'value'     => 'RAM'
//             ]
//         ]
//     ],
//     [
//         'value'             => '8 GB',
//         'rate'              => 0.2,
//         'max'               => 1,
//         'conditions'        => [
//             [
//                 'attribute' => 'specification_name',
//                 'value'     => 'RAM'
//             ]
//         ]
//     ],
//     [
//         'value'             => '16 GB',
//         'rate'              => 0.2,
//         'max'               => 1,
//         'conditions'        => [
//             [
//                 'attribute' => 'specification_name',
//                 'value'     => 'RAM'
//             ]
//         ]
//     ],
// ];