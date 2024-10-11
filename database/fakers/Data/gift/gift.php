<?php

use App\Enums\GenerateType;

return [
    'name'              => 'gift',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\gift\attributes\name.php',
        require database_path().'\fakers\Data\gift\attributes\status.php',
        require database_path().'\fakers\Data\gift\attributes\author_id.php',
        require database_path().'\fakers\Data\gift\attributes\start_datetime.php',
        require database_path().'\fakers\Data\gift\attributes\end_datetime.php',
    ]
];