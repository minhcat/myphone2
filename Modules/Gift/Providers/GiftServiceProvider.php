<?php

namespace Modules\Gift\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Modules\Gift\Policies\GiftPolicy;
use Modules\Gift\Policies\GiftProductItemPolicy;
use Modules\Gift\Policies\GiftProductPolicy;

class GiftServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Gift';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'gift';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerPermission();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'Resources/lang'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }

    private function registerPermission()
    {
        // Gift
        Gate::define('gift:browse', [GiftPolicy::class, 'browse']);
        Gate::define('gift:read', [GiftPolicy::class, 'read']);
        Gate::define('gift:add', [GiftPolicy::class, 'add']);
        Gate::define('gift:edit', [GiftPolicy::class, 'edit']);
        Gate::define('gift:delete', [GiftPolicy::class, 'delete']);
        Gate::define('gift:approve', [GiftPolicy::class, 'approve']);
        // Gift Product
        Gate::define('gift_product:browse', [GiftProductPolicy::class, 'browse']);
        Gate::define('gift_product:add', [GiftProductPolicy::class, 'add']);
        Gate::define('gift_product:edit', [GiftProductPolicy::class, 'edit']);
        Gate::define('gift_product:delete', [GiftProductPolicy::class, 'delete']);
        // Gift Product Item
        Gate::define('gift_product_item:browse', [GiftProductItemPolicy::class, 'browse']);
        Gate::define('gift_product_item:add', [GiftProductItemPolicy::class, 'add']);
        Gate::define('gift_product_item:edit', [GiftProductItemPolicy::class, 'edit']);
        Gate::define('gift_product_item:delete', [GiftProductItemPolicy::class, 'delete']);
    }
}
