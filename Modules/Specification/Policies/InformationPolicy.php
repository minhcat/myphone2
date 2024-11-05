<?php

namespace Modules\Specification\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InformationPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'specification_information:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'specification_information:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'specification_information:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'specification_information:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'specification_information:delete');
    }
}
