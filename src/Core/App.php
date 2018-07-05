<?php

namespace Core;

use Core\Http\Exception\{HttpExceptionInterface, NotFoundHttpException};
use Core\Http\Response\Response;
use Core\Routing\Router;
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class App
 * @package Core
 */
class App implements RequestHandlerInterface
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @inheritdoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $response =  $this->handleRequest($request);
        } catch (\Exception $e) {
            $response = $this->handleException($e, $request);
        }

        return $response;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws NotFoundHttpException
     */
    protected function handleRequest(ServerRequestInterface $request): ResponseInterface
    {
        $route = $this->router->matchRequest($request);

        $response = $route($request);

        return $response;
    }

    /**
     * @param \Exception $e
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    protected function handleException(\Exception $e, ServerRequestInterface $request): ResponseInterface
    {
        $statusCode = 500;
        if ($e instanceof HttpExceptionInterface) {
            $statusCode = $e->getStatusCode();
        }

        return (new Response())
            ->setContent($e->getMessage())
            ->setStatusCode($statusCode);
    }
}