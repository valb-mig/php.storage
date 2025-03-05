<?php

namespace App\Service;

use App\Contract\StorageServiceContract;

class StorageService implements StorageServiceContract
{
    public function list(string $dir): array
    {
        return [];
    }

    public function upload(string $dir, array $file): string
    {
        return '';
    }
}