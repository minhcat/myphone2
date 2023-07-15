<?php

namespace Modules\Brand\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Brand\Entities\Brand;

class BrandRepository extends AbstractRepository
{
    function getModel()
    {
        return new Brand();
    }
}