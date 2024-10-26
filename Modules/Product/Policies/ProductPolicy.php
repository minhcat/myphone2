<?php

namespace Modules\Product\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'product:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'product:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'product:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'product:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'product:delete');
    }
}
