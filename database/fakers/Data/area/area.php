<?php

use App\Enums\GenerateType;

return [
    'name'              => 'area',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\area\attributes\name.php',
        require database_path().'\fakers\Data\area\attributes\author_id.php',
    ]
];