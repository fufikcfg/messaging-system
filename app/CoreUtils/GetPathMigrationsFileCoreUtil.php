<?php

namespace App\CoreUtils;

class GetPathMigrationsFileCoreUtil
{
    public function handle(): array
    {
        return $this->getFilesInDirectory();
    }

    private function getFilesInDirectory(): array
    {
        $files = [];

        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(
            $this->getDirectoryModulesMigrations()
        ));

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }
        }


        return $this->sortingPaths($files);
    }

    private function getDirectoryModulesMigrations(): string
    {
        return sprintf('%s', base_path('app/Modules/'));
    }

    private function sortingPaths(array $files): array
    {
        return array_filter(array_map(function ($item) {
            if (preg_match('#/Migrations/.+\.php$#i', $item)) {
                return preg_replace('#.*?/app/#', 'app/', $item);
            }
            return null;
        }, $files));
    }
}
