<?php

namespace App\Providers;

use App\Observers\OrderObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Modules\Order\Entities\Order;
use Modules\User\Entities\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Order::observe(OrderObserver::class);

        view()->share('admin_active_theme', get_admin_active_theme());
    }
}
