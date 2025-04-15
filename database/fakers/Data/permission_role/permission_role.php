<?php

use App\Enums\GenerateType;

return [
    'name'              => 'permission_role',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\permission_role\attributes\permission_id.php',
        require database_path().'\fakers\Data\permission_role\attributes\role_id.php',
    ]
];