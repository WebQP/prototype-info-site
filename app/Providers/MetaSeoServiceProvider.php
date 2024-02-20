<?php

namespace App\Providers;

use App\Services\MetaSeoService;
use Illuminate\Support\ServiceProvider;

class MetaSeoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('meta.seo', fn () => new MetaSeoService());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
