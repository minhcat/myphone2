<?php

namespace Modules\Transporter\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransporterCasePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'transporter_case:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'transporter_case:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'transporter_case:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'transporter_case:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'transporter_case:delete');
    }
}
