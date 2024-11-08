<?php

namespace Modules\Voucher\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoucherPolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'voucher:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'voucher:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'voucher:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'voucher:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'voucher:delete');
    }

    public function approve(User $user)
    {
        return check_permission($user, 'voucher:approve');
    }
}
