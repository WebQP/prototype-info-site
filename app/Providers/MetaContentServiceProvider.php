<?php

namespace App\Providers;

use App\Services\MetaContentService;
use Illuminate\Support\ServiceProvider;

class MetaContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('meta.content', fn () => new MetaContentService());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
