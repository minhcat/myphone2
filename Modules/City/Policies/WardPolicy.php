<?php

namespace Modules\City\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WardPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'city_district_ward:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'city_district_ward:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'city_district_ward:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'city_district_ward:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'city_district_ward:delete');
    }
}
