<?php

namespace App\Providers;

use App\CoreUtils\GetPathMigrationsFileCoreUtil;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom((new GetPathMigrationsFileCoreUtil())->handle());
    }
}
