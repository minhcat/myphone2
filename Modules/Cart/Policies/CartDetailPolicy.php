<?php

namespace Modules\Cart\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartDetailPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'cart_detail:browse');
    }

    public function add(User $user)
    {
        return check_permission($user, 'cart_detail:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'cart_detail:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'cart_detail:delete');
    }
}
