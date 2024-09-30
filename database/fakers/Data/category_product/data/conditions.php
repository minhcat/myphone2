<?php

return [
    'gaming smartphone'     => [
        'has'               => [
            [
                ['Iphone', ['Plus', 'Pro Max']], ['Samsung Galaxy', ['+', 'Ultra', 'FE']], ['Xiaomi', 'Pro'], ['OPPO', 'Pro'],
                ['Vsmart', 'Aris'], ['Realme', ['Pro', 'Note']]
            ]
        ],
        'not'               => [
            ['Tab', 'Pad']
        ],
    ],
    'camera smartphone'     => [
        'has'               => [
            ['Iphone', 'Samsung Galaxy', 'Xiaomi', ['OPPO', 'Reno']]
        ],
        'not'               => [
            ['Tab', 'Pad', ['Iphone', ['11', '12']], ['Galaxy', ['A06', 'A35', 'A55', 'S21', 'S22']]]
        ],
    ],
    'standard smartphone'   => [
        'has'               => [
            [
                ['Iphone', ['13', '14', '15']], ['Samsung Galaxy', ['S23', 'S24']], 'Xiaomi', ['OPPO', 'Find'], ['Vsmart', ['Star', 'Live']],
                'Realme', 'Vivo', ['Mobell', ['S', 'Nova']], ['Itel', ['L6502', 'S23', 'RS4', 'P55']], ['Masstel', ['Hapi']],
                ['Asus', ['ROG', 'Zenfone']]
            ]
        ],
        'not'               => [
            ['Tab', 'Pad', 'Plus', 'Pro Max', '+', 'Ultra', 'FE', 'Pro', ['Realme', 'Note'], 'Vivobook']
        ],
    ],
    'light smartphone'      => [
        'has'               => [
            [['Iphone', ['11', '12']], ['Samsung Galaxy', ['A06', 'A35', 'A55', 'S21', 'S22']], ['Xiaomi', '13'], ['Vsmart', ['Bee', 'Joy']]]
        ],
        'not'               => [
            ['Tab', 'Pad', 'Plus', 'Pro Max', '+', 'Ultra', 'FE', 'Pro', ['Galaxy', 'Z']]
        ],
    ],
    'tablet'                => [
        'has'               => [
            ['Ipad', 'Tab', 'Pad'],
        ],
    ],
    'cellphone'             => [
        'has'               => [
            ['Nokia', ['Mobell', ['F', 'M']], 'Itel it2600', ['Masstel', ['Fami', 'IZI', 'Lux']]]
        ],
    ],
    'gaming laptop'         => [
        'has'               => [
            [['Dell', 'Precision'], ['Asus', 'Gaming'], ['Acer', 'Gaming']]
        ],
    ],
    'graphics laptop'       => [
        'has'               => [
            [['Dell', 'Vostro'], 'Asus ProArt', ['Lenovo', 'Pro']]
        ]
    ],
    'office laptop'         => [
        'has'               => [
            [['Dell', ['Inspiron', 'Latitude']], ['Asus', ['Vivobook', 'Zenbook']], 'Acer', 'Lenovo']
        ],
        'not'               => [
            ['Gaming', 'Pro']
        ],
    ],
    'accessory'             => [
        'has'               => [
            ['Airpod', 'Samsung IA500', 'JBL', 'Apacer', 'Sandisk']
        ],
    ],
];