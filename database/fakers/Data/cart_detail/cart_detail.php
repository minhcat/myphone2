<?php

use App\Enums\GenerateType;

return [
    'name'              => 'cart_detail',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\cart_detail\attributes\cart_id.php',
        require database_path().'\fakers\Data\cart_detail\attributes\target_id.php',
        require database_path().'\fakers\Data\cart_detail\attributes\author_id.php',
        require database_path().'\fakers\Data\cart_detail\attributes\price.php',
    ]
];