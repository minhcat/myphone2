<?php

namespace Modules\Specification\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Specification\Entities\Information;

class InformationRepository extends AbstractRepository
{
    function getModel()
    {
        return new Information();
    }

    public function paginateBySpecificationId($specification_id, $take = self::TAKE_DEFAULT, $search = null, $field = null)
    {
        if (is_null($search)) {
            return $this->model->where('specification_id', $specification_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where('specification_id', $specification_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('specification_id', $specification_id)->where('value', 'LIKE', "%$search%")->paginate($take);
    }

    protected function convertDataCreate($data, $more = [])
    {
        foreach ($more as $name => $field) {
            $data[$name] = $field;
        }

        return $data;
    }
}