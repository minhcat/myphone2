<?php

namespace Modules\Product\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Product\Entities\Detail;

class DetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new Detail();
    }

    public function findByProductId($id)
    {
        return $this->model->where('product_id', $id)->get();
    }
}
