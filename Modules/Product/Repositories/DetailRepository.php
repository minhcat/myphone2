<?php

namespace Modules\Product\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Product\Entities\Detail;

class DetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new Detail();
    }
}
