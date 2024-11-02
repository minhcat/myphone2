<?php

namespace Modules\Sale\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SaleProductPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'sale_product:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'sale_product:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'sale_product:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'sale_product:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'sale_product:delete');
    }
}
