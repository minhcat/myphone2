<?php

use App\Enums\GenerateType;

return [
    'name'              => 'product_tag',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\product_tag\attributes\product_id.php',
        require database_path().'\fakers\Data\product_tag\attributes\tag_id.php',
    ]
];