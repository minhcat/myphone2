<?php

use App\Enums\GenerateType;

return [
    'name'              => 'gift_product',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\gift_product\attributes\target_type.php',
        require database_path().'\fakers\Data\gift_product\attributes\target_id.php',
        require database_path().'\fakers\Data\gift_product\attributes\gift_id.php',
        require database_path().'\fakers\Data\gift_product\attributes\author_id.php',
        require database_path().'\fakers\Data\gift_product\attributes\quantity.php',
    ]
];