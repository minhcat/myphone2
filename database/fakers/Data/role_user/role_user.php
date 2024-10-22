<?php

use App\Enums\GenerateType;

return [
    'name'              => 'role_user',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\role_user\attributes\role_id.php',
        require database_path().'\fakers\Data\role_user\attributes\user_id.php',
    ]
];