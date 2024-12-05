<?php

namespace Modules\Config\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfigPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'config:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'config:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'config:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'config:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'config:delete');
    }
}
