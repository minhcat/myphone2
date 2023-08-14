<?php

namespace Modules\Attribute\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Attribute\Entities\Attribute;

class AttributeRepository extends AbstractRepository
{
    function getModel()
    {
        return new Attribute();
    }
}