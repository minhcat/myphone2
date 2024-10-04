<?php

use App\Enums\GenerateType;

return [
    'name'              => 'cart',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\cart\attributes\code.php',
        require database_path().'\fakers\Data\cart\attributes\author_id.php',
    ]
];