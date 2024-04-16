<?php

namespace Modules\Cart\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Cart\Entities\Cart;

class CartRepository extends AbstractRepository
{
    function getModel()
    {
        return new Cart();
    }
}