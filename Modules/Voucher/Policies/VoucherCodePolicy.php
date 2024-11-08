<?php

namespace Modules\Voucher\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoucherCodePolicy
{
    use HandlesAuthorization;

    public function browse(User $user)
    {
        return check_permission($user, 'voucher_code:browse');
    }

    public function read(User $user)
    {
        return check_permission($user, 'voucher_code:read');
    }

    public function add(User $user)
    {
        return check_permission($user, 'voucher_code:add');
    }

    public function edit(User $user)
    {
        return check_permission($user, 'voucher_code:edit');
    }

    public function delete(User $user)
    {
        return check_permission($user, 'voucher_code:delete');
    }
}
