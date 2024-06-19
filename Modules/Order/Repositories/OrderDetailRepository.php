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

    public function paginateByOrderId($order_id, $take = self::TAKE_DEFAULT)
    {
        return $this->model->orderBy($this->orderBy, $this->orderType)->where('order_id', $order_id)->paginate($take);
    }

    public function findWhere($where = [])
    {
        return $this->model->where($where)->first();
    }
}