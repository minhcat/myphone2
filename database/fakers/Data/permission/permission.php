<?php

use App\Enums\GenerateType;

return [
    'name'              => 'permission',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\permission\attributes\name.php',
        require database_path().'\fakers\Data\permission\attributes\key.php',
        require database_path().'\fakers\Data\permission\attributes\table.php',
        require database_path().'\fakers\Data\permission\attributes\author_id.php',
    ]
];