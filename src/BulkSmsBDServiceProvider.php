<?php

namespace Amsiam\BulkSmsBD;

use Illuminate\Support\ServiceProvider;

class BulkSmsBDServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('BulkSmsBD', function () {
            return new BulkSmsBD;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config' => base_path('config')
        ]);
    }
}
