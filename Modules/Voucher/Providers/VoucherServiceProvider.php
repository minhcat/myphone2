<?php

namespace Modules\Voucher\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Modules\Voucher\Policies\VoucherCodePolicy;
use Modules\Voucher\Policies\VoucherPolicy;

class VoucherServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Voucher';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'voucher';

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
        // Voucher
        Gate::define('voucher:browse', [VoucherPolicy::class, 'browse']);
        Gate::define('voucher:read', [VoucherPolicy::class, 'read']);
        Gate::define('voucher:add', [VoucherPolicy::class, 'add']);
        Gate::define('voucher:edit', [VoucherPolicy::class, 'edit']);
        Gate::define('voucher:delete', [VoucherPolicy::class, 'delete']);
        Gate::define('voucher:approve', [VoucherPolicy::class, 'approve']);
        // Voucher Code
        Gate::define('voucher_code:browse', [VoucherCodePolicy::class, 'browse']);
        Gate::define('voucher_code:read', [VoucherCodePolicy::class, 'read']);
        Gate::define('voucher_code:add', [VoucherCodePolicy::class, 'add']);
        Gate::define('voucher_code:edit', [VoucherCodePolicy::class, 'edit']);
        Gate::define('voucher_code:delete', [VoucherCodePolicy::class, 'delete']);
    }
}
