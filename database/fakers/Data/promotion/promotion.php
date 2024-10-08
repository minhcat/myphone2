<?php

use App\Enums\GenerateType;

return [
    'name'              => 'promotion',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\promotion\attributes\name.php',
        require database_path().'\fakers\Data\promotion\attributes\status.php',
        require database_path().'\fakers\Data\promotion\attributes\author_id.php',
        require database_path().'\fakers\Data\promotion\attributes\condition_type.php',
        require database_path().'\fakers\Data\promotion\attributes\condition_value.php',
        require database_path().'\fakers\Data\promotion\attributes\discount_target.php',
        require database_path().'\fakers\Data\promotion\attributes\discount_type.php',
        require database_path().'\fakers\Data\promotion\attributes\discount_value.php',
        require database_path().'\fakers\Data\promotion\attributes\discount_minimum.php',
        require database_path().'\fakers\Data\promotion\attributes\discount_maximum.php',
        require database_path().'\fakers\Data\promotion\attributes\start_datetime.php',
        require database_path().'\fakers\Data\promotion\attributes\end_datetime.php',
    ]
];