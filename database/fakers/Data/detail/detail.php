<?php

use App\Enums\GenerateType;

return [
    'name'              => 'detail',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\detail\attributes\product_id.php',
        require database_path().'\fakers\Data\detail\attributes\specification_id.php',
        require database_path().'\fakers\Data\detail\attributes\information_id.php',
        require database_path().'\fakers\Data\detail\attributes\author_id.php',
    ]
];