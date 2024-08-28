<?php

use App\Enums\GenerateType;

return [
    'name'              => 'user',
    'generate_type'     => GenerateType::RANDOM,
    'attributes'        => [
        require database_path().'\fakers\Data\user\attributes\gender.php',
        require database_path().'\fakers\Data\user\attributes\firstname.php',
        require database_path().'\fakers\Data\user\attributes\lastname.php',
        require database_path().'\fakers\Data\user\attributes\job.php',
        require database_path().'\fakers\Data\user\attributes\account.php',
        require database_path().'\fakers\Data\user\attributes\email.php',
    ]
];