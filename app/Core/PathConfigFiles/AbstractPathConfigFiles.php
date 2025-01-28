<?php

namespace App\Core\PathConfigFiles;

abstract class AbstractPathConfigFiles
{
    private string $config;

    abstract function handle(): mixed;

    protected function setConfig(string $config): void
    {
        $this->config = $config;
    }

    private function getConfig(): string
    {
        return ucfirst($this->config);
    }

    protected function getFilesInDirectory(): array
    {
        $files = [];

        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(
            $this->getDirectoryModules()
        ));

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }
        }

        return $this->sortingPaths($files);
    }

    private function getDirectoryModules(): string
    {
        return sprintf('%s', base_path('app/Modules/'));
    }

    private function sortingPaths(array $files): array
    {
        return array_filter(array_map(function ($item) {
            if (preg_match(sprintf('#/%s/.+\.php$#i', $this->getConfig()), $item)) {
                return preg_replace('#.*?/app/#', 'app/', $item);
            }
            return null;
        }, $files));
    }
}
