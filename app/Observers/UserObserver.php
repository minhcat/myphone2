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
        $code = generate_code(new Cart);

        $this->cartRepository->create([
            'code'      => '#'.$code ,
            'author_id' => $user->id,
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
        $this->cartRepository->deleteWhere(['author_id' => $user->id]);
    }
}
