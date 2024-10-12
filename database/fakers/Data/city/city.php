<?php

use App\Enums\GenerateType;

return [
    'name'              => 'city',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\city\attributes\name.php',
        require database_path().'\fakers\Data\city\attributes\shortname.php',
        require database_path().'\fakers\Data\city\attributes\author_id.php',
    ]
];