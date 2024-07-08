<?php

namespace Modules\Cart\Repositories;

use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\DB;
use Modules\Cart\Entities\CartDetail;

class CartDetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new CartDetail();
    }

    public function paginateByCartId($cart_id, $take = self::TAKE_DEFAULT)
    {
        return $this->model->orderBy($this->orderBy, $this->orderType)->where('cart_id', $cart_id)->paginate($take);
    }

    public function findWhere($where = [])
    {
        return $this->model->where($where)->first();
    }

    public function deleteWhere($where = [])
    {
        return $this->model->where($where)->delete();
    }
}