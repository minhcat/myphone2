<?php

namespace Modules\Theme\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThemePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'theme:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'theme:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'theme:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'theme:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'theme:delete');
    }
}
