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

    protected function convertDataCreate($data, $more = [])
    {
        foreach ($more as $name => $field) {
            $data[$name] = $field;
        }

        return $data;
    }

    protected function convertDataUpdate($data, $more = [])
    {
        unset($data['_token']);
        unset($data['_method']);
        unset($data['author_id']);

        return $data;
    }

    public function paginateByAttributeId($attributeId, $search = null, $take = self::TAKE_DEFAULT, $field = null) // fix: change 'value' to null
    {
        if (is_null($search)) {
            return $this->model->where('attribute_id', $attributeId)->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where('attribute_id', $attributeId)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('attribute_id', $attributeId)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);  // fix: change 'name' to 'value'
    }

    public function deleteByAttributeId($attributeId)
    {
        return $this->model->where('attribute_id', $attributeId)->delete();
    }
}