<?php

use App\Enums\PromotionStatus;

return [
    'attribute'                     => 'status',
    'values'                        => [
        [
            'value'                 => PromotionStatus::END,
            'rate'                  => 0.0333,
            'max'                   => 1,
        ],
        [
            'value'                 => PromotionStatus::INPROGRESS,
            'rate'                  => 0.0333,
            'max'                   => 1,
        ],
        [
            'value'                 => PromotionStatus::APPROVED,
            'rate'                  => 0.0333,
            'max'                   => 2,
        ],
        [
            'value'                 => PromotionStatus::PENDING,
            'rate'                  => 0.0333,
            'max'                   => 1,
        ],
    ]
];