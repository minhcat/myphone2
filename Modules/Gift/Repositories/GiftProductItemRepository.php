<?php

namespace Modules\Gift\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Gift\Entities\GiftProductItem;

class GiftProductItemRepository extends AbstractRepository
{
    function getModel()
    {
        return new GiftProductItem();
    }

    public function paginateByGiftProductId($gift_product_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('gift_product_id', $gift_product_id)->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}