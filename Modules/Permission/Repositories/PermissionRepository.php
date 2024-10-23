<?php

namespace Modules\Permission\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Permission\Entities\Permission;

class PermissionRepository extends AbstractRepository
{
    protected $orderType = 'asc';

    public function getModel()
    {
        return new Permission();
    }
}