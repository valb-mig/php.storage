<?php
declare(strict_types=1);

namespace App\Enum;

enum Status: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
}