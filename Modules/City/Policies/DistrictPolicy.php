<?php

namespace Modules\City\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistrictPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'city_district:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'city_district:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'city_district:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'city_district:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'city_district:delete');
    }
}
