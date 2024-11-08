<?php

namespace Modules\User\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'user_address:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'user_address:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'user_address:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'user_address:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'user_address:delete');
    }
}
