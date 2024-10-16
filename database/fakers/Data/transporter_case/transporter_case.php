<?php

use App\Enums\GenerateType;

return [
    'name'              => 'transporter_case',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\transporter_case\attributes\name.php',
        require database_path().'\fakers\Data\transporter_case\attributes\transporter_id.php',
        require database_path().'\fakers\Data\transporter_case\attributes\author_id.php',
        require database_path().'\fakers\Data\transporter_case\attributes\estimate_time_type.php',
        require database_path().'\fakers\Data\transporter_case\attributes\estimate_time.php',
    ]
];