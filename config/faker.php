<?php

use App\Enums\FakerConditionType;
use App\Enums\GenerateType;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Class Properties
    |--------------------------------------------------------------------------
    |
    | init class properties with default value. Lorem ipsum dolor sit amet,
    | consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
    | et dolore magna aliqua.
    */

    'defaults'                  => [
        'faker'                 => [
            'name'              => null,
            'generate_type'     => GenerateType::RANDOM,
            'attribute'         => []
        ],
        'attribute'             => [
            'name'              => null,
            'generate_type'     => GenerateType::RANDOM
        ],
        'value'                 => [
            'value'             => null,
            'rate'              => 1,
            'max'               => 1000,
            'space'             => true
        ],
        'with'                  => [
            'value'             => null,
            'rate'              => 1,
        ],
        'condition'             => [
            'attribute'         => null,
            'column'            => null,
            'type'              => FakerConditionType::EQUAL,
            'value'             => null,
        ],
        'prefix'                => [
            'order'             => 1,
        ],
        'suffix'                => [
            'order'             => 1,
        ],
    ],
];