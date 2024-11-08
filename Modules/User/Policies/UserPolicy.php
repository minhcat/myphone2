<?php

namespace Modules\User\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'user:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'user:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'user:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'user:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'user:delete');
    }
}
