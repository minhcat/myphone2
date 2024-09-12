<?php

return [
    'attribute'                     => 'name',
    'suffixes'                      => require database_path().'/fakers/Data/product/attributes/name.suffix.php',
    'values'                        => require_list([
        database_path() . '/fakers/Data/product/attributes/name/apple/values.php',
        database_path() . '/fakers/Data/product/attributes/name/samsung/values.php',
        database_path() . '/fakers/Data/product/attributes/name/xiaomi/values.php',
        database_path() . '/fakers/Data/product/attributes/name/oppo/values.php',
        database_path() . '/fakers/Data/product/attributes/name/vsmart/values.php',
        database_path() . '/fakers/Data/product/attributes/name/realme/values.php',
        database_path() . '/fakers/Data/product/attributes/name/nokia/values.php',
        database_path() . '/fakers/Data/product/attributes/name/vivo/values.php',
        database_path() . '/fakers/Data/product/attributes/name/mobell/values.php',
        database_path() . '/fakers/Data/product/attributes/name/itel/values.php',
        database_path() . '/fakers/Data/product/attributes/name/masstel/values.php',
        database_path() . '/fakers/Data/product/attributes/name/dell/values.php',
        database_path() . '/fakers/Data/product/attributes/name/asus/values.php',
        database_path() . '/fakers/Data/product/attributes/name/acer/values.php',
        database_path() . '/fakers/Data/product/attributes/name/lenovo/values.php',
        database_path() . '/fakers/Data/product/attributes/name/other/values.php',
    ]),
];