<?php

use App\Enums\GenerateType;

return [
    'name'              => 'product',
    // 'generate_type'     => GenerateType::SEQUENTIAL,
    'generate_type'     => GenerateType::RANDOM,
    'attributes'        => [
        require database_path().'\fakers\Data\product\attributes\brand_id.php',
        require database_path().'\fakers\Data\product\attributes\brand_name.php',
        require database_path().'\fakers\Data\product\attributes\name.php',
        require database_path().'\fakers\Data\product\attributes\slug.php',
        require database_path().'\fakers\Data\product\attributes\sku_prefix.php',
        require database_path().'\fakers\Data\product\attributes\sku_number.php',
        require database_path().'\fakers\Data\product\attributes\author_id.php',
    ]
];