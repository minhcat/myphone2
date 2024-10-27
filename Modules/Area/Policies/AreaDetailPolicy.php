<?php

namespace Modules\Area\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AreaDetailPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'area_detail:browse');
    }

    public function add(User $user)
    {
        return check_permission($user, 'area_detail:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'area_detail:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'area_detail:delete');
    }
}
