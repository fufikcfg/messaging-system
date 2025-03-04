<?php

namespace App\Kernel\PathConfigFiles\Routes;

use App\Kernel\PathConfigFiles\AbstractPathConfigFiles;
use Illuminate\Support\Facades\Route;

class PathConfigRouteFiles extends AbstractPathConfigFiles
{
    public function __construct()
    {
        $this->setConfig('Routes');
        $this->setPregReplacePath(false);
    }

    public function handle(): callable
    {
        return function () {
            foreach (array_merge(
                         $this->getFilesInDirectory(), [$this->getDefaultPathWebRoute()]
                     ) as $route) {
                Route::withoutMiddleware(null)
                    ->group($route);
            }
        };
    }

    private function getDefaultPathWebRoute(): string
    {
        return sprintf('%s', base_path('routes/web.php'));
    }
}
