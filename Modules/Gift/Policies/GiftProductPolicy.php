<?php

namespace Modules\Gift\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiftProductPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'gift_product:browse');
    }

    public function add(User $user)
    {
        return check_permission($user, 'gift_product:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'gift_product:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'gift_product:delete');
    }
}
