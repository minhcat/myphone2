<?php

use App\Enums\GenerateType;

return [
    'name'              => 'invoice',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\invoice\attributes\code.php',
        require database_path().'\fakers\Data\invoice\attributes\author_id.php',
        require database_path().'\fakers\Data\invoice\attributes\address_id.php',
        require database_path().'\fakers\Data\invoice\attributes\transporter_case_id.php',
        require database_path().'\fakers\Data\invoice\attributes\status.php',
    ]
];