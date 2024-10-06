<?php

use App\Enums\GenerateType;

return [
    'name'              => 'invoice_detail',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\invoice_detail\attributes\invoice_id.php',
        require database_path().'\fakers\Data\invoice_detail\attributes\target_id.php',
        require database_path().'\fakers\Data\invoice_detail\attributes\author_id.php',
        require database_path().'\fakers\Data\invoice_detail\attributes\price.php',
    ]
];