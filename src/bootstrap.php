<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ResponseFactory;

$responseFactory = new ResponseFactory();
AppFactory::setResponseFactory($responseFactory);
$app = AppFactory::create();
