<?php

namespace Modules\Specification\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpecificationPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'specification:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'specification:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'specification:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'specification:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'specification:delete');
    }
}
