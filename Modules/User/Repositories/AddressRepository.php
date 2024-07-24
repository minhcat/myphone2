<?php

namespace Modules\User\Repositories;

use App\Repositories\AbstractRepository;
use Modules\User\Entities\Address;

class AddressRepository extends AbstractRepository
{
    protected $searchFieldName = 'content';

    function getModel()
    {
        return new Address();
    }
}