<?php

namespace Modules\Sale\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'sale:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'sale:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'sale:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'sale:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'sale:delete');
    }
        
    public function approve(User $user)
    {
        return check_permission($user, 'sale:approve');
    }
}
