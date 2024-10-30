<?php

namespace Modules\City\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Modules\City\Policies\CityPolicy;
use Modules\City\Policies\DistrictPolicy;
use Modules\City\Policies\WardPolicy;

class CityServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'City';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'city';

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
        // city
        Gate::define('city:browse', [CityPolicy::class, 'browse']);
        Gate::define('city:read', [CityPolicy::class, 'read']);
        Gate::define('city:add', [CityPolicy::class, 'add']);
        Gate::define('city:edit', [CityPolicy::class, 'edit']);
        Gate::define('city:delete', [CityPolicy::class, 'delete']);
        // district
        Gate::define('district:browse', [DistrictPolicy::class, 'browse']);
        Gate::define('district:read', [DistrictPolicy::class, 'read']);
        Gate::define('district:add', [DistrictPolicy::class, 'add']);
        Gate::define('district:edit', [DistrictPolicy::class, 'edit']);
        Gate::define('district:delete', [DistrictPolicy::class, 'delete']);
        // ward
        Gate::define('ward:browse', [WardPolicy::class, 'browse']);
        Gate::define('ward:read', [WardPolicy::class, 'read']);
        Gate::define('ward:add', [WardPolicy::class, 'add']);
        Gate::define('ward:edit', [WardPolicy::class, 'edit']);
        Gate::define('ward:delete', [WardPolicy::class, 'delete']);
    }
}
