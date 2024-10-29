<?php

namespace Modules\Category\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'category:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'category:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'category:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'category:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'category:delete');
    }
}
