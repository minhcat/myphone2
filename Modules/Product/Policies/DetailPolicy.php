<?php

namespace Modules\Product\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DetailPolicy
{
    use HandlesAuthorization;

    public function read(User $user)
    {
        return check_permission($user, 'product_detail:read');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'product_detail:edit');
    }
}
