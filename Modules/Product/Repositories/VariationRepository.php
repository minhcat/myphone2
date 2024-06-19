<?php

namespace Modules\Product\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Product\Entities\Variation;

class VariationRepository extends AbstractRepository
{
    protected $searchFieldName = 'code';

    function getModel()
    {
        return new Variation();
    }

    public function paginateByProductId($product_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->where('product_id', $product_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where('product_id', $product_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where('product_id', $product_id)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }

    public function create($data, $more = [])
    {
        $variation = parent::create($data, $more);
        $variation->options()->sync($data['option']);

        return $variation;
    }

    public function update($id, $data, $more = [])
    {
        $variation = parent::update($id, $data, $more);
        $variation->options()->sync($data['option']);

        return $variation;
    }
}