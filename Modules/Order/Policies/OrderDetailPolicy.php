<?php

namespace Modules\Order\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderDetailPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'order_detail:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'order_detail:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'order_detail:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'order_detail:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'order_detail:delete');
    }
}
