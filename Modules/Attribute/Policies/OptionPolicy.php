<?php

namespace Modules\Attribute\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'attribute_option:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'attribute_option:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'attribute_option:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'attribute_option:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'attribute_option:delete');
    }
}
