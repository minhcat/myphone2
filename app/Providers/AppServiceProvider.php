<?php

namespace App\Providers;

use App\Observers\OrderObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Blade;
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

        Blade::directive('cancombine', function(string $expression) {
            return "<?php if (check_permission_combine({$expression})): ?>";
        });
        Blade::directive('endcancombine', function($expression) {
            return "<?php endif ?>";
        });
        
        Blade::directive('canmany', function(string $expression) {
            return "<?php if (check_permission_allow_many({$expression})): ?>";
        });
        Blade::directive('endcanmany', function() {
            return "<?php endif ?>";
        });

        view()->share('admin_active_theme', get_admin_active_theme());
    }
}
