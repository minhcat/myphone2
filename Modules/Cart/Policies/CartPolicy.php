<?php

namespace Modules\Cart\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'cart:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'cart:read');
    }

    public function order(User $user)
    {
        return check_permission($user, 'cart:order');
    }
}
