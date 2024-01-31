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

    public function getParents()
    {
        return $this->model->whereNull('parent_id')->orderBy('order')->get();
    }

    public function order($categories, $parent_id = null)
    {
        foreach ($categories as $index => $cate) {
            $category = $this->model->find($cate->id);
            $category->order = $index + 1;
            $category->parent_id = $parent_id;
            $category->save();

            if (isset($cate->children)) {
                $this->order($cate->children, $cate->id);
            }
        }
    }
}