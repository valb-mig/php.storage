<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Response;
use App\Enum\Status;
use App\Service\StorageService;
use Psr\Http\Message\{
    ServerRequestInterface,
    ResponseInterface
};

class ApiStorageController
{
    public static function add(ServerRequestInterface $request, ResponseInterface $response)
    {
    }

    public static function get(ServerRequestInterface $request, ResponseInterface $response)
    {
    }

    public static function remove(ServerRequestInterface $request, ResponseInterface $response)
    {
    }

    public static function list(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $dir = $request->getQueryParams()['dir'] ?? null;

            if(empty($dir)) {
                throw new \Exception('Directory is empty');
            }

            $responseObject = new Response(
                Status::SUCCESS,
                'Request success',
                StorageService::list("../$dir")
            );

            $response
                ->getBody()
                ->write($responseObject->getJson());

            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } catch(\Exception $e) {

            $responseObject = new Response(
                Status::ERROR,
                "Request error: {$e->getMessage()}"
            );

            $response
                ->getBody()
                ->write($responseObject->getJson());

            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }
}