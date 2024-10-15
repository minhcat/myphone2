<?php

use App\Enums\TerritoryType;
use Modules\City\Repositories\CityRepository;
use Modules\City\Repositories\DistrictRepository;

return [
    'attribute'                     => 'territory_id',
    'values'                        => [
        [
            'id'                    => 1,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => CityRepository::class,
                    'column'        => 'name',
                    'value'         => 'Đồng Nai',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Tỉnh Gần Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::CITY,
                ],
            ],
        ],
        [
            'id'                    => 2,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => CityRepository::class,
                    'column'        => 'name',
                    'value'         => 'Bắc Ninh',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Tỉnh Gần Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::CITY,
                ],
            ],
        ],
        [
            'id'                    => 3,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Quận 1',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 4,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Quận 2',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 5,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Quận 3',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 6,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Quận 4',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 7,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Quận 5',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 8,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Bình Thạnh',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Ngoại Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 9,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Tân Phú',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Ngoại Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 10,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Gò Vấp',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Ngoại Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 11,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Thủ Đức',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Ngoại Thành Sài Gòn',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 12,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Hai Bà Trưng',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 13,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Hoàn Kiếm',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 14,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Đống Đa',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 15,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Ba Đình',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Nội Thành Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 16,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Bắc Từ Liêm',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Ngoại Thành Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 17,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Nam Từ Liêm',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Ngoại Thành Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
        [
            'id'                    => 18,
            'value'                 => null,
            'rate'                  => 1,
            'max'                   => 1,
            'conditions'            => [
                [
                    'repository'    => DistrictRepository::class,
                    'column'        => 'name',
                    'value'         => 'Long Biên',
                ],
                [
                    'attribute'     => 'area_name',
                    'value'         => 'Ngoại Thành Hà Nội',
                ],
                [
                    'attribute'     => 'territory_type',
                    'value'         => TerritoryType::DISTRICT,
                ],
            ],
        ],
    ]
];