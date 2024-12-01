<?php

namespace Modules\Category\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Config\Entities\Config;

class ConfigRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Config();
    }
}