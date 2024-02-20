<?php

namespace App\Providers;

use App\Services\NavigationService;
use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('navigation.service', fn () => new NavigationService());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
