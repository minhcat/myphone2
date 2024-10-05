<?php

use App\Enums\GenerateType;

return [
    'name'              => 'order',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\order\attributes\code.php',
        require database_path().'\fakers\Data\order\attributes\author_id.php',
        require database_path().'\fakers\Data\order\attributes\address_id.php',
        require database_path().'\fakers\Data\order\attributes\transporter_case_id.php',
        require database_path().'\fakers\Data\order\attributes\status.php',
    ]
];