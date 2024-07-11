<?php

namespace Modules\City\Repositories;

use App\Repositories\AbstractRepository;
use Modules\City\Entities\District;

class DistrictRepository extends AbstractRepository
{
    function getModel()
    {
        return new District();
    }
}