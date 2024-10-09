<?php

use App\Enums\GenerateType;

return [
    'name'              => 'sale',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\sale\attributes\name.php',
        require database_path().'\fakers\Data\sale\attributes\status.php',
        require database_path().'\fakers\Data\sale\attributes\author_id.php',
        require database_path().'\fakers\Data\sale\attributes\discount_type.php',
        require database_path().'\fakers\Data\sale\attributes\discount_value.php',
        require database_path().'\fakers\Data\sale\attributes\discount_minimum.php',
        require database_path().'\fakers\Data\sale\attributes\discount_maximum.php',
        require database_path().'\fakers\Data\sale\attributes\start_datetime.php',
        require database_path().'\fakers\Data\sale\attributes\end_datetime.php',
    ]
];