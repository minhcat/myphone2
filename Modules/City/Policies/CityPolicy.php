<?php

namespace Modules\City\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'city:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'city:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'city:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'city:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'city:delete');
    }
}
