<?php

use App\Enums\FakerConditionType;

return [
    [
        'order'                     => 1,
        'values'                    => [
            [
                'value'                 => null,
                'rate'                  => 0.7,
            ],
            [
                'value'                 => 'Trần',
                'rate'                  => 0.05,
                'conditions'            => [
                    [
                        'attribute'     => 'firstname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Trần',
                    ],
                ],
            ],
            [
                'value'                 => 'Phạm',
                'rate'                  => 0.05,
                'conditions'            => [
                    [
                        'attribute'     => 'firstname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Phạm',
                    ],
                ],
            ],
            [
                'value'                 => 'Vũ',
                'rate'                  => 0.05,
                'conditions'            => [
                    [
                        'attribute'     => 'firstname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Vũ',
                    ],
                ],
            ],
            [
                'value'                 => 'Lưu',
                'rate'                  => 0.05,
                'conditions'            => [
                    [
                        'attribute'     => 'firstname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Lưu',
                    ],
                ],
            ],
            [
                'value'                 => 'Quách',
                'rate'                  => 0.05,
                'conditions'            => [
                    [
                        'attribute'     => 'firstname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Quách',
                    ],
                ],
            ],
            [
                'value'                 => 'Nguyễn',
                'rate'                  => 0.05,
                'conditions'            => [
                    [
                        'attribute'     => 'firstname',
                        'type'          => FakerConditionType::NOT_EQUAL,
                        'value'         => 'Nguyễn',
                    ],
                ],
            ],
        ]
    ],
];