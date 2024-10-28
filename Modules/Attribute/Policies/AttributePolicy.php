<?php

namespace Modules\Attribute\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'attribute:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'attribute:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'attribute:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'attribute:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'attribute:delete');
    }
}
