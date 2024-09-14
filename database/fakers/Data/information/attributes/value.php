<?php

return [
    'attribute'                     => 'value',
    'values'                        => require_list([
        database_path() . '/fakers/Data/information/attributes/value/cpu.php',
        database_path() . '/fakers/Data/information/attributes/value/ram.php',
        database_path() . '/fakers/Data/information/attributes/value/hard_disk.php',
        database_path() . '/fakers/Data/information/attributes/value/graphics_card.php',
        database_path() . '/fakers/Data/information/attributes/value/battery.php',
        database_path() . '/fakers/Data/information/attributes/value/os.php',
        database_path() . '/fakers/Data/information/attributes/value/screen.php',
        database_path() . '/fakers/Data/information/attributes/value/weight.php',
    ]),
];