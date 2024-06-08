<?php

namespace Modules\DiscountForm\Repositories;

use App\Repositories\AbstractRepository;
use Modules\DiscountForm\Entities\DiscountForm;

class DiscountFormRepository extends AbstractRepository
{
    public function getModel()
    {
        return new DiscountForm();
    }
}
