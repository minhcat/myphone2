<?php

use App\Enums\GenerateType;

return [
    'name'              => 'ward',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\ward\attributes\name.php',
        require database_path().'\fakers\Data\ward\attributes\shortname.php',
        require database_path().'\fakers\Data\ward\attributes\author_id.php',
        require database_path().'\fakers\Data\ward\attributes\district_id.php',
    ]
];