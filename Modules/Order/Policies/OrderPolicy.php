<?php

namespace Modules\Order\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'order:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'order:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'order:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'order:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'order:delete');
    }
        
    public function approve(User $user)
    {
        return check_permission($user, 'order:approve');
    }
}
