<?php

namespace Modules\Cart\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Cart\Entities\Cart;

class CartRepository extends AbstractRepository
{
    protected $searchFieldName = 'code';

    function getModel()
    {
        return new Cart();
    }

    public function deleteWhere($where = [])
    {
        $this->model->where($where)->delete();
    }
}