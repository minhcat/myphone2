<?php

namespace Modules\Invoice\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Modules\Invoice\Policies\InvoiceDetailPolicy;
use Modules\Invoice\Policies\InvoicePolicy;

class InvoiceServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Invoice';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'invoice';

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
        // Invoice
        Gate::define('invoice:browse', [InvoicePolicy::class, 'browse']);
        Gate::define('invoice:read', [InvoicePolicy::class, 'read']);
        Gate::define('invoice:add', [InvoicePolicy::class, 'add']);
        Gate::define('invoice:edit', [InvoicePolicy::class, 'edit']);
        Gate::define('invoice:delete', [InvoicePolicy::class, 'delete']);
        // Invoice Detail
        Gate::define('invoice_detail:browse', [InvoiceDetailPolicy::class, 'browse']);
        Gate::define('invoice_detail:read', [InvoiceDetailPolicy::class, 'read']);
        Gate::define('invoice_detail:add', [InvoiceDetailPolicy::class, 'add']);
        Gate::define('invoice_detail:edit', [InvoiceDetailPolicy::class, 'edit']);
        Gate::define('invoice_detail:delete', [InvoiceDetailPolicy::class, 'delete']);
    }
}
