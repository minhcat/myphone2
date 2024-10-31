<?php

namespace Modules\Gift\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiftProductItemPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'gift_product_item:browse');
    }

    public function add(User $user)
    {
        return check_permission($user, 'gift_product_item:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'gift_product_item:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'gift_product_item:delete');
    }
}
