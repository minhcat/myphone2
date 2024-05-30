<?php

namespace Modules\Condition\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Condition\Entities\Condition;

class ConditionRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Condition();
    }
}
