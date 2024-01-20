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
}