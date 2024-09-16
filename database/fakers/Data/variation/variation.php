<?php

use App\Enums\GenerateType;

return [
    'name'              => 'variation',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\variation\attributes\code.php',
        require database_path().'\fakers\Data\variation\attributes\author_id.php',
        require database_path().'\fakers\Data\variation\attributes\product_id.php',
        require database_path().'\fakers\Data\variation\attributes\price.php',
    ]
];