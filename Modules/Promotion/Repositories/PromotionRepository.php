<?php

namespace Modules\Promotion\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Promotion\Entities\Promotion;

class PromotionRepository extends AbstractRepository
{
    function getModel()
    {
        return new Promotion();
    }
}