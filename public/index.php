<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/bootstrap.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\ApiStorageController;

$app->post('/api', function (Request $req, Response $res){
    $res
        ->getBody()
        ->write(json_encode([
            'status' => 'success'
        ]));

    return $res->withHeader('Content-Type', 'application/json')->withStatus(200);
});

$app->group('/api', function ($group) {
    $group->post('/add', function (Request $req, Response $res){
        ApiStorageController::add($req, $res);
    });

    $group->get('/list', function (Request $req, Response $res){
        return ApiStorageController::list($req, $res);
    });
});


$app->run();
