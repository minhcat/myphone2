<?php

return [
    'name'              => 'address',
    'generate_type'     => 'random',
    'attributes'        => [
        require database_path().'\fakers\Data\address\attributes\content.php',
        require database_path().'\fakers\Data\address\attributes\ward_id.php',
        require database_path().'\fakers\Data\address\attributes\author_id.php',
    ]
];