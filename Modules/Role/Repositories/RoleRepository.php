<?php

namespace Modules\Role\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Role\Entities\Role;

class RoleRepository extends AbstractRepository
{
    function getModel()
    {
        return new Role();
    }
}