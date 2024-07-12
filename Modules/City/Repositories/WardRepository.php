<?php

namespace Modules\City\Repositories;

use App\Repositories\AbstractRepository;
use Modules\City\Entities\Ward;

class WardRepository extends AbstractRepository
{
    function getModel()
    {
        return new Ward();
    }

    public function paginateByDistrictId($district_id, $search, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('district_id', $district_id)->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}