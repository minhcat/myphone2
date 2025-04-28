<?php

namespace Modules\Dashboard\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'dashboard:browse');
    }
}
