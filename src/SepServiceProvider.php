<?php

namespace sahifedp\Sep;

use Illuminate\Support\ServiceProvider;

class SepServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->mergeConfigFrom(
            __DIR__.'/../config/menu.php',
            'sep.menu'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php',
            'sep.permissions'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/sep.php',
            'sep.config'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__.'/Views', 'sep');
    }
}
