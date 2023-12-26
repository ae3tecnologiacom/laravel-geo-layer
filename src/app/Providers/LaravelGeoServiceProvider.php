<?php

namespace Ae3\LaravelGeoLayer\app\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelGeoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'laravel-geo-layer');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('laravel-geo-layer.php'),
            ], 'config');
        }
    }
}