<?php

namespace App\Core\PathConfigFiles\Routes;

use App\Core\PathConfigFiles\AbstractPathConfigFiles;
use Illuminate\Support\Facades\Route;

class PathConfigRouteFiles extends AbstractPathConfigFiles
{
    public function __construct()
    {
        $this->setConfig('Routes');
    }

    public function handle(): callable
    {
        return function () {
            foreach ($this->getFilesInDirectory() as $routeFile) {
                Route::middleware('api')
                    ->group(base_path($routeFile));
            }
        };
    }
}
