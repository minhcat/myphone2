<?php

use App\Enums\TerritoryType;

return [
    'attribute'                     => 'territory_type',
    'values'                        => [
        [
            'value'                 => TerritoryType::CITY,
            'rate'                  => 1,
            'max'                   => 2,
            'conditions'            => [
                [
                    'attribute'     => 'area_name',
                    'value'         => ['Tỉnh Gần Hà Nội', 'Tỉnh Gần Sài Gòn']
                ]
            ],
        ],
        [
            'value'                 => TerritoryType::DISTRICT,
            'rate'                  => 1,
            'max'                   => 16,      // NTHN: 4, NTSG: 5, GTHN: 3, GTSG: 4
            'conditions'            => [
                [
                    'attribute'     => 'area_name',
                    'value'         => ['Nội Thành Hà Nội', 'Nội Thành Sài Gòn', 'Ngoại Thành Hà Nội', 'Ngoại Thành Sài Gòn']
                ]
            ],
        ]
    ]
];