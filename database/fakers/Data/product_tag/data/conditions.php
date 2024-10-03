<?php

return [
    'modern'            => [
        'has'           => [
            ['Iphone', 'Samsung', 'Xiaomi', 'Vsmart', 'Vivo', 'Realme', 'OPPO', 'Dell', 'Acer']
        ],
    ],
    'classic'           => [
        'has'           => [
            ['Mobell', 'Nokia', 'Itel', 'Asus', 'Lenovo']
        ],
    ],
    'high-end'          => [
        'has'           => [
            ['Plus', 'Pro Max', '+', 'Ultra', 'FE', 'Pro']
        ],
    ],
    'mid-range'         => [
        'not'           => [
            ['Plus', 'Pro Max', '+', 'Ultra', 'FE', 'Pro']
        ],
    ],
];