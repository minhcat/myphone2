<?php

namespace Modules\Product\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Product\Entities\Variation;

class VariationRepository extends AbstractRepository
{
    function getModel()
    {
        return new Variation();
    }

    public function paginateByProductId($product_id, $take = self::TAKE_DEFAULT, $search = null, $field = 'value')
    {
        if (is_null($search)) {
            return $this->model->where('product_id', $product_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where('product_id', $product_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('product_id', $product_id)->where('name', 'LIKE', "%$search%")->paginate($take);
    }
}