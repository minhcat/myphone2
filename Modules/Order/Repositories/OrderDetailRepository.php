<?php

namespace Modules\Order\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Order\Entities\OrderDetail;

class OrderDetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new OrderDetail();
    }
}