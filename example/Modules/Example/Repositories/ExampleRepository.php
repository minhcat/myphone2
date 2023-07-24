<?php

namespace Modules\Example\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Example\Entities\Example;

class ExampleRepository extends AbstractRepository
{
    function getModel()
    {
        return new Example();
    }
}