<?php

namespace App\Service;

use App\Contract\StorageServiceContract;

class StorageService implements StorageServiceContract
{
    public static function list(string $dir): array
    {
        try {
            if(!is_dir($dir)) {
                throw new \Exception("'$dir' is not a directory");
            }

            return scandir($dir);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }

    public static function upload(string $dir, array $file): string
    {
        return '';
    }
}