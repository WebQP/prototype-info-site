<?php

namespace App\Services\Localization;

use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind("Localization", 'App\Services\Localization\Localization');
    }
}
