<?php

namespace Modules\Area\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Area\Entities\AreaDetail;

class AreaDetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new AreaDetail();
    }

    public function paginateByAreaId($area_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('area_id', $area_id)->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}
