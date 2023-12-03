<?php

namespace Modules\Specification\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Specification\Entities\Specification;

class SpecificationRepository extends AbstractRepository
{
    function getModel()
    {
        return new Specification();
    }
}