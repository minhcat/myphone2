<?php

namespace Modules\Permission\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'permission:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'permission:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'permission:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'permission:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'permission:delete');
    }
}
