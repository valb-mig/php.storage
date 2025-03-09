<?php

namespace App\Contract;

interface StorageServiceContract
{
    public static function list(string $dir): array;
    public static function upload(string $dir, array $file): string;
}