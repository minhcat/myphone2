<?php

namespace Modules\Role\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'role:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'role:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'role:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'role:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'role:delete');
    }
}
