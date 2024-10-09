<?php

use App\Enums\GenerateType;

return [
    'name'              => 'sale_product',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\sale_product\attributes\target_type.php',
        require database_path().'\fakers\Data\sale_product\attributes\target_id.php',
        require database_path().'\fakers\Data\sale_product\attributes\sale_id.php',
        require database_path().'\fakers\Data\sale_product\attributes\author_id.php',
        require database_path().'\fakers\Data\sale_product\attributes\discount_type.php',
        require database_path().'\fakers\Data\sale_product\attributes\discount_value.php',
        require database_path().'\fakers\Data\sale_product\attributes\discount_minimum.php',
        require database_path().'\fakers\Data\sale_product\attributes\discount_maximum.php',
    ]
];