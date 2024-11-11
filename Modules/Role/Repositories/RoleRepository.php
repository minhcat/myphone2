<?php

namespace Modules\Role\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Role\Entities\Role;

class RoleRepository extends AbstractRepository
{
    protected $orderType = 'asc';

    function getModel()
    {
        return new Role();
    }

    public function updatePermission($role_id, $permission_data)
    {
        $role = $this->model->find($role_id);
        $role->permissions()->detach();
        $role->permissions()->attach(array_keys($permission_data));
    }
}