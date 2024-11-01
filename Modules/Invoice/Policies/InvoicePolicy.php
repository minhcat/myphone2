<?php

namespace Modules\Invoice\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'invoice:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'invoice:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'invoice:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'invoice:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'invoice:delete');
    }
}
