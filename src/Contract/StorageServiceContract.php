<?php
declare(strict_types=1);

namespace App\Contract;

interface StorageServiceContract
{
    public static function list(string $dir): array;
    public static function upload(string $dir, array $file): string;
}