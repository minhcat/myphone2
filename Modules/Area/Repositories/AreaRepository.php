<?php

namespace Modules\Area\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Area\Entities\Area;

class AreaRepository extends AbstractRepository
{
    function getModel()
    {
        return new Area();
    }
}