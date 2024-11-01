<?php

namespace Modules\Invoice\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoiceDetailPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'invoice_detail:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'invoice_detail:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'invoice_detail:add');
    }
    
    public function edit(User $user)
    {
        return check_permission($user, 'invoice_detail:edit');
    }
    
    public function delete(User $user)
    {
        return check_permission($user, 'invoice_detail:delete');
    }
}
