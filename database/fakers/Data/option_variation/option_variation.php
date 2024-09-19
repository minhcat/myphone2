<?php

use App\Enums\GenerateType;

return [
    'name'              => 'option_variation',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\option_variation\attributes\option_id.php',
        require database_path().'\fakers\Data\option_variation\attributes\variation_id.php',
    ]
];