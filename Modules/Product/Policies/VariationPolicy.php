<?php

namespace Modules\Product\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VariationPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'product_variation:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'product_variation:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'product_variation:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'product_variation:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'product_variation:delete');
    }
}
