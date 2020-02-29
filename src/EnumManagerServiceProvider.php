<?php

namespace OmeneJoseph\EnumManager;

use Illuminate\Support\ServiceProvider;
use OmeneJoseph\EnumManager\Commands\CreateEnumCommand;
use OmeneJoseph\EnumManager\Contracts\EnumManagerInterface;

class EnumManagerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'omenejoseph');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'omenejoseph');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/enummanager.php', 'enummanager');

        // Register the service the package provides.
//        $this->app->singleton('enummanager', function ($app) {
//            return new EnumManager;
//        });

        $this->app->bind(EnumManagerInterface::class, function ($app) {
            return new EnumManager;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['enummanager'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/enummanager.php' => config_path('enummanager.php'),
        ], 'enummanager.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/omenejoseph'),
        ], 'enummanager.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/omenejoseph'),
        ], 'enummanager.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/omenejoseph'),
        ], 'enummanager.views');*/

        // Registering package commands.
         $this->commands([CreateEnumCommand::class]);
    }
}
