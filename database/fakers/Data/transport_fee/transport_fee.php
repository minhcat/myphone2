<?php

use App\Enums\GenerateType;

return [
    'name'              => 'transport_fee',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\transport_fee\attributes\name.php',
        require database_path().'\fakers\Data\transport_fee\attributes\author_id.php',
        require database_path().'\fakers\Data\transport_fee\attributes\area_id.php',
        require database_path().'\fakers\Data\transport_fee\attributes\transporter_id.php',
        require database_path().'\fakers\Data\transport_fee\attributes\transporter_case_id.php',
        require database_path().'\fakers\Data\transport_fee\attributes\range.php',
        require database_path().'\fakers\Data\transport_fee\attributes\total_range_bottom_type.php',
        require database_path().'\fakers\Data\transport_fee\attributes\total_range_bottom.php',
        require database_path().'\fakers\Data\transport_fee\attributes\total_range_top_type.php',
        require database_path().'\fakers\Data\transport_fee\attributes\total_range_top.php',
        require database_path().'\fakers\Data\transport_fee\attributes\cost.php',
    ]
];