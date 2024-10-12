<?php

use App\Enums\GenerateType;

return [
    'name'              => 'district',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\district\attributes\name.php',
        require database_path().'\fakers\Data\district\attributes\shortname.php',
        require database_path().'\fakers\Data\district\attributes\city_id.php',
        require database_path().'\fakers\Data\district\attributes\author_id.php',
    ]
];