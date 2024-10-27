<?php

namespace Modules\Area\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AreaPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'area:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'area:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'area:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'area:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'area:delete');
    }
}
