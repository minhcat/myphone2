<?php

use App\Enums\GenerateType;

return [
    'name'              => 'information',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\information\attributes\specification_id.php',
        require database_path().'\fakers\Data\information\attributes\specification_name.php',
        require database_path().'\fakers\Data\information\attributes\value.php',
        require database_path().'\fakers\Data\information\attributes\author_id.php',
    ]
];