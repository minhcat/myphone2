<?php

namespace Modules\Specification\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Specification\Entities\Information;

class InformationRepository extends AbstractRepository
{
    protected $searchFieldName = 'value';

    function getModel()
    {
        return new Information();
    }

    public function getWhereIn(string $field, array $in)
    {
        return $this->model->whereIn($field, $in)->get();
    }

    public function paginateBySpecificationId($specification_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->where('specification_id', $specification_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where('specification_id', $specification_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where('specification_id', $specification_id)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}
