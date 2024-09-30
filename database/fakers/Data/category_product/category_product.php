<?php

use App\Enums\GenerateType;

return [
    'name'              => 'category_product',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\category_product\attributes\category_id.php',
        require database_path().'\fakers\Data\category_product\attributes\product_id.php',
    ]
];