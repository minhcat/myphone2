<?php

namespace Modules\Gift\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiftPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'gift:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'gift:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'gift:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'gift:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'gift:delete');
    }

    public function approve(User $user)
    {
        return check_permission($user, 'gift:approve');
    }
}
