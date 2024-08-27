<?php

use App\Enums\Gender;

return [
    'attribute'                     => 'gender',
    'values'                        => [
        [
            'value'                 => Gender::MALE,
            'rate'                  => 0.475
        ],
        [
            'value'                 => Gender::FEMALE,
            'rate'                  => 0.475
        ],
        [
            'value'                 => Gender::OTHER,
            'rate'                  => 0.05
        ],
    ],
];