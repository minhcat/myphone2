<?php

namespace Modules\Cart\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Cart\Entities\CartDetail;

class CartDetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new CartDetail();
    }

    public function paginateByCartId($cart_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        if (is_null($search)) {
            return $this->model->where('cart_id', $cart_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where('cart_id', $cart_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('cart_id', $cart_id)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }

    public function findWhere($where = [])
    {
        return $this->model->where($where)->first();
    }
}