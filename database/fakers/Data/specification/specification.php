<?php

use App\Enums\GenerateType;

return [
    'name'              => 'specification',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\specification\attributes\name.php',
        require database_path().'\fakers\Data\specification\attributes\author_id.php',
    ]
];