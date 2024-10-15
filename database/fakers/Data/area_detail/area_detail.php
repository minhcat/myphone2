<?php

use App\Enums\GenerateType;

return [
    'name'              => 'area_detail',
    'generate_type'     => GenerateType::SEQUENTIAL,
    'attributes'        => [
        require database_path().'\fakers\Data\area_detail\attributes\area_id.php',
        require database_path().'\fakers\Data\area_detail\attributes\area_name.php',
        require database_path().'\fakers\Data\area_detail\attributes\territory_type.php',
        require database_path().'\fakers\Data\area_detail\attributes\territory_id.php',
        require database_path().'\fakers\Data\area_detail\attributes\author_id.php',
    ]
];