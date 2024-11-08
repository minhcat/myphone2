<?php

namespace Modules\TransportFee\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransportFeePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'transport_fee:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'transport_fee:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'transport_fee:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'transport_fee:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'transport_fee:delete');
    }
}
