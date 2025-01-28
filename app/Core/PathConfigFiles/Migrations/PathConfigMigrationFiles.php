<?php

namespace App\Core\PathConfigFiles\Migrations;

use App\Core\PathConfigFiles\AbstractPathConfigFiles;

class PathConfigMigrationFiles extends AbstractPathConfigFiles
{
    public function __construct()
    {
        $this->setConfig('Migrations');
    }

    public function handle(): array
    {
        return $this->getFilesInDirectory();
    }
}
