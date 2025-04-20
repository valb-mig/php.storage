<?php
declare(strict_types=1);

namespace App\Service;

use App\Contract\StorageServiceContract;
use App\Entity\File;

class StorageService implements StorageServiceContract
{
    public static string $path = __DIR__."/../../uploads";

    public static function list(string $dir): array
    {
        $dir = self::$path."/$dir";

        try {
            if(!is_dir($dir)) {
                throw new \Exception("'$dir' is not a directory");
            }

            $arrFiles = [];

            foreach(scandir($dir) as $file) {
                if($file === '.' || $file === '..') {
                    continue;
                }

                $arrFiles[$file] = new File($dir."/$file");
            }

            return $arrFiles;
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }

    public static function remove(string $file): void
    {
        $file = self::$path."/$file";

        try {
            if(!is_file($file)) {
                throw new \Exception("'$file' is not a file");
            }

            unlink($file);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }

    public static function upload(string $dir, array $file): string
    {
        return '';
    }
}