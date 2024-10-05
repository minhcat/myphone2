<?php

use App\Enums\GenerateType;

return [
    'name'              => 'order_detail',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\order_detail\attributes\order_id.php',
        require database_path().'\fakers\Data\order_detail\attributes\target_id.php',
        require database_path().'\fakers\Data\order_detail\attributes\author_id.php',
        require database_path().'\fakers\Data\order_detail\attributes\price.php',
    ]
];