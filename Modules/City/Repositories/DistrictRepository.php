<?php

namespace Modules\City\Repositories;

use App\Repositories\AbstractRepository;
use Modules\City\Entities\District;

class DistrictRepository extends AbstractRepository
{
    function getModel()
    {
        return new District();
    }

    public function paginateByCityId($city_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('city_id', $city_id)->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}