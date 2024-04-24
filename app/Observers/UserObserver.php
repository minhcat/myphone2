<?php

namespace App\Observers;

use Modules\Cart\Entities\Cart;
use Modules\Cart\Repositories\CartRepository;
use Modules\User\Entities\User;

class UserObserver
{
    /** @var \Modules\Cart\Repositories\CartRepository */
    protected $cartRepository;

    /**
     * Create User Observer instance.
    */
    public function __construct()
    {
        $this->cartRepository = new CartRepository;
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \Modules\User\Entities\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $code = rand(1000, 9999);
        while (!is_null(Cart::where('code', '#'.$code)->first())) {
            $code = rand(1000, 9999);
        }
        $this->cartRepository->create([
            'code'      => '#'.$code ,
            'user_id'   => $user->id,
        ]);
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \Modules\User\Entities\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $this->cartRepository->deleteWhere(['user_id' => $user->id]);
    }
}
