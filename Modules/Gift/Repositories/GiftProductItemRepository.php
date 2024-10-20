<?php

namespace Modules\Gift\Repositories;

use App\Enums\TargetType;
use App\Repositories\AbstractRepository;
use Modules\Gift\Entities\GiftProductItem;

class GiftProductItemRepository extends AbstractRepository
{
    function getModel()
    {
        return new GiftProductItem();
    }

    public function paginateByGiftProductId($gift_product_id, $search = null, $take = self::TAKE_DEFAULT)
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
            ->orderBy($this->orderBy, $this->orderType)->where('gift_product_id', $gift_product_id)->paginate($take);
        }
        return $this->model->where('gift_product_id', $gift_product_id)->orderBy($this->orderBy, $this->orderType)->paginate($take);
    }
}