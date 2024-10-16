<?php

use App\Enums\GenerateType;

return [
    'name'              => 'transporter',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\transporter\attributes\name.php',
        require database_path().'\fakers\Data\transporter\attributes\author_id.php',
    ]
];