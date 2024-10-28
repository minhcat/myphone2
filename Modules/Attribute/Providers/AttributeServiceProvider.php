<?php

namespace Modules\Attribute\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Modules\Attribute\Policies\AttributePolicy;
use Modules\Attribute\Policies\OptionPolicy;

class AttributeServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Attribute';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'attribute';

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
        // attribute
        Gate::define('attribute:browse', [AttributePolicy::class, 'browse']);
        Gate::define('attribute:read', [AttributePolicy::class, 'read']);
        Gate::define('attribute:add', [AttributePolicy::class, 'add']);
        Gate::define('attribute:edit', [AttributePolicy::class, 'edit']);
        Gate::define('attribute:delete', [AttributePolicy::class, 'delete']);
        // option
        Gate::define('attribute_option:browse', [OptionPolicy::class, 'browse']);
        Gate::define('attribute_option:read', [OptionPolicy::class, 'read']);
        Gate::define('attribute_option:add', [OptionPolicy::class, 'add']);
        Gate::define('attribute_option:edit', [OptionPolicy::class, 'edit']);
        Gate::define('attribute_option:delete', [OptionPolicy::class, 'delete']);
    }
}
