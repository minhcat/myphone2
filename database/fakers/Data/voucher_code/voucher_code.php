<?php

use App\Enums\GenerateType;

return [
    'name'              => 'voucher_code',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\voucher_code\attributes\code.php',
        require database_path().'\fakers\Data\voucher_code\attributes\voucher_id.php',
        require database_path().'\fakers\Data\voucher_code\attributes\quantity.php',
        require database_path().'\fakers\Data\voucher_code\attributes\discount_type.php',
        require database_path().'\fakers\Data\voucher_code\attributes\discount_value.php',
        require database_path().'\fakers\Data\voucher_code\attributes\discount_minimum.php',
        require database_path().'\fakers\Data\voucher_code\attributes\discount_maximum.php',
    ]
];