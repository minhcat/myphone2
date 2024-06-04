<?php

namespace Modules\Condition\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Condition\Entities\ConditionTarget;

class ConditionTargetRepository extends AbstractRepository
{
    protected $searchFieldName = 'code';

    public function getModel()
    {
        return new ConditionTarget();
    }

    public function paginateByConditionId($condition_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        if (is_null($search)) {
            return $this->model->where('condition_id', $condition_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where('condition_id', $condition_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('condition_id', $condition_id)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}
