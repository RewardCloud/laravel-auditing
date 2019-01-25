<?php

namespace OwenIt\Auditing;

use Illuminate\Support\ServiceProvider;

/**
 * This is the owen auditing service provider class.
 */
class AuditingServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->setupMigrations($this->app);
        $this->setupConfig($this->app);
    }

    /**
     * Setup the config.
     *
     * @param $app
     */
    protected function setupConfig($app)
    {
        $source = realpath(__DIR__ . '/../config/auditing.php');

        if ($app->runningInConsole()) {
            $this->publishes([$source => config_path('auditing.php')]);
        }

        $this->mergeConfigFrom($source, 'auditing');
    }

    /**
     * Setup the migrations.
     *
     * @param $app
     */
    protected function setupMigrations($app)
    {
        $source = realpath(__DIR__ . '/../database/migrations/');

        if ($app->runningInConsole()) {
            $this->publishes([$source => database_path('migrations')], 'migrations');
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
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
}
