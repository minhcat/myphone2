<?php

namespace Modules\Cart\Repositories;

use App\Enums\TargetType;
use App\Repositories\AbstractRepository;
use Modules\Cart\Entities\CartDetail;

class CartDetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new CartDetail();
    }

    public function paginateByCartId($cart_id, $search = null, $take = self::TAKE_DEFAULT)
    {
        if ($search !== null) {
            return $this->model->where(function($query) use ($search) {
                $query->where(function($query2) use ($search) {
                    $query2->where('target_type', TargetType::PRODUCT)
                    ->whereHas('target', function($query3) use ($search) {
                        $query3->where('name', 'like', '%'.$search.'%');
                    });
                })->orWhere(function($query2) use ($search) {
                    $query2->where('target_type', TargetType::VARIANT)
                    ->whereHas('variation', function($query3) use ($search) {
                        $query3->whereHas('product', function($query4) use ($search) {
                            $query4->where('name', 'like', '%'.$search.'%');
                        });
                    });
                });
            })
            ->orderBy($this->orderBy, $this->orderType)->where('cart_id', $cart_id)->paginate($take);
        }
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