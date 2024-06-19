<?php

namespace Modules\Attribute\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Attribute\Entities\Option;

class OptionRepository extends AbstractRepository
{
    protected $searchFieldName = 'value';

    function getModel()
    {
        return new Option();
    }

    public function paginateByAttributeId($attributeId, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->where('attribute_id', $attributeId)->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where('attribute_id', $attributeId)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where('attribute_id', $attributeId)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }

    public function deleteByAttributeId($attributeId)
    {
        return $this->model->where('attribute_id', $attributeId)->delete();
    }
}
