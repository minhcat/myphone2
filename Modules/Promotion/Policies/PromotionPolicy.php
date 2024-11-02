<?php

namespace Modules\Promotion\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromotionPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'promotion:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'promotion:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'promotion:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'promotion:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'promotion:delete');
    }
        
    public function approve(User $user)
    {
        return check_permission($user, 'promotion:approve');
    }
}
