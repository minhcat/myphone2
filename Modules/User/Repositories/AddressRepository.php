<?php

namespace Modules\User\Repositories;

use App\Repositories\AbstractRepository;
use Modules\User\Entities\Address;

class AddressRepository extends AbstractRepository
{
    protected $searchFieldName = 'content';

    function getModel()
    {
        return new Address();
    }

    public function paginateByUserId($user_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('author_id', $user_id)->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }

    public function getByUserId($user_id) {
        return $this->model->where('author_id', $user_id)->orderBy($this->orderBy, $this->orderType)->get();
    }
}