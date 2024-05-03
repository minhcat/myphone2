<?php

namespace Modules\Order\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Order\Entities\Order;

class OrderRepository extends AbstractRepository
{
    protected $searchFieldName = 'code';

    function getModel()
    {
        return new Order();
    }
}