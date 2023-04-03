<?php

namespace Modules\Product\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Product\Entities\Product;

class ProductRepository extends AbstractRepository
{
    function getModel()
    {
        return new Product();
    }
}