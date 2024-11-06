<?php

namespace Modules\Tag\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'tag:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'tag:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'tag:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'tag:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'tag:delete');
    }
}
