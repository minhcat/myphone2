<?php

namespace Modules\City\Repositories;

use App\Repositories\AbstractRepository;
use Modules\City\Entities\City;

class CityRepository extends AbstractRepository
{
    function getModel()
    {
        return new City();
    }
}