<?php

use App\Enums\GenerateType;

return [
    'name'              => 'gift_product_item',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\gift_product_item\attributes\target_type.php',
        require database_path().'\fakers\Data\gift_product_item\attributes\target_id.php',
        require database_path().'\fakers\Data\gift_product_item\attributes\gift_product_id.php',
        require database_path().'\fakers\Data\gift_product_item\attributes\author_id.php',
        require database_path().'\fakers\Data\gift_product_item\attributes\quantity.php',
    ]
];