<?php

namespace App\Kernel\Providers;

use App\Kernel\PathConfigFiles\Routes\PathConfigRouteFiles;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->routes((new PathConfigRouteFiles())->handle());
    }
}
