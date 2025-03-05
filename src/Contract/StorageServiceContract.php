<?php

namespace App\Contract;

interface StorageServiceContract
{
    public function list(string $dir): array;
    public function upload(string $dir, array $file): string;
}