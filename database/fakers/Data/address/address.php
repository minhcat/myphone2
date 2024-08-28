<?php

use App\Enums\GenerateType;

return [
    'name'              => 'address',
    'generate_type'     => GenerateType::RANDOM,
    'attributes'        => [
        require database_path().'\fakers\Data\address\attributes\content.php',
        require database_path().'\fakers\Data\address\attributes\ward_id.php',
        require database_path().'\fakers\Data\address\attributes\author_id.php',
    ]
];