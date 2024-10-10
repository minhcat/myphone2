<?php

use App\Enums\GenerateType;

return [
    'name'              => 'voucher',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\voucher\attributes\name.php',
        require database_path().'\fakers\Data\voucher\attributes\status.php',
        require database_path().'\fakers\Data\voucher\attributes\author_id.php',
        require database_path().'\fakers\Data\voucher\attributes\discount_target.php',
        require database_path().'\fakers\Data\voucher\attributes\discount_type.php',
        require database_path().'\fakers\Data\voucher\attributes\discount_value.php',
        require database_path().'\fakers\Data\voucher\attributes\discount_minimum.php',
        require database_path().'\fakers\Data\voucher\attributes\discount_maximum.php',
        require database_path().'\fakers\Data\voucher\attributes\start_datetime.php',
        require database_path().'\fakers\Data\voucher\attributes\end_datetime.php',
    ]
];