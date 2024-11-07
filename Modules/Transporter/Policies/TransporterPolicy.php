<?php

namespace Modules\Transporter\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransporterPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'transporter:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'transporter:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'transporter:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'transporter:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'transporter:delete');
    }
}
