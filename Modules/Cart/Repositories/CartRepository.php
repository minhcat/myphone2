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

    public function delete($id)
    {
        $this->model->find($id)->details()->delete();

        return parent::delete($id);
    }

    public function deleteWhere($where = [])
    {
        $models = $this->model->where($where)->get();

        foreach ($models as $model) {
            $model->details()->delete();
        }

        $this->model->where($where)->delete();
    }
}