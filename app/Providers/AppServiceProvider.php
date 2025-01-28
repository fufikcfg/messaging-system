<?php

namespace App\Providers;

use App\Core\PathConfigFiles\Migrations\PathConfigMigrationFiles;
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
        $this->loadMigrationsFrom((new PathConfigMigrationFiles())->handle());
    }
}
