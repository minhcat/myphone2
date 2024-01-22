<?php

namespace Modules\Category\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Category\Entities\Category;

class CategoryRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Category();
    }

    public function delete($id)
    {
        $this->model->where('parent_id', $id)->update(['parent_id' => null]);

        return parent::delete($id);
    }
}