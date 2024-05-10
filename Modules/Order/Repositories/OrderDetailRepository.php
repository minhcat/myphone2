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

    public function paginateByOrderId($order_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        if (is_null($search)) {
            return $this->model->where('order_id', $order_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where('order_id', $order_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('order_id', $order_id)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}