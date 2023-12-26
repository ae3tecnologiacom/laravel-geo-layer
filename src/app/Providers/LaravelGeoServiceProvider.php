<?php

namespace Ae3\LaravelGeoLayer\app\Providers;

use Ae3\LaravelGeoLayer\app\Services\Contracts\GeocodingServiceContract;
use Ae3\LaravelGeoLayer\app\Services\GeocodingService;
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

        $this->app->bind(GeocodingServiceContract::class, GeocodingService::class);
    }
}