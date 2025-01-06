<?php

namespace Hulakhi\Providers;

use Illuminate\Support\ServiceProvider;
use Hulakhi\Hulakhi;

class HulakhiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('hulakhi', function () {
            return new Hulakhi();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../views/' => resource_path('views/hulakhi'),
        ], 'views');

        $this->loadViewsFrom(__DIR__ . '/../views', 'hulakhi');
    }
}
