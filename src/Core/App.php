<?php

namespace Core;

use Core\Http\Exception\HttpExceptionInterface;
use Core\Http\Request;
use Core\Http\Response\Response;
use Core\Middleware\MiddlewareInterface;
use Core\Routing\Route;
use Core\Routing\Router;

/**
 * Class App
 * @package Core
 */
class App implements AppInterface
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @var array MiddlewareInterface[]
     */
    private $middlewares = [];

    public function __construct(Router $router, \PDO $pdo)
    {
        $this->router = $router;
        $this->pdo = $pdo;
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    /**
     * @param MiddlewareInterface $middleware
     * @return App
     */
    public function addMiddleware(MiddlewareInterface $middleware): self
    {
        $this->middlewares[] = $middleware;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function handle(Request $request): Response
    {
        try {
            $route = $this->router->matchRequest($request);

            $response = $this->handleMiddlewares($request) ?: $this->handleRequest($request, $route);
        } catch (\Exception $e) {
            $response = $this->handleException($e, $request);
        }

        return $response;
    }

    /**
     * @param Request $request
     * @return Response|null
     */
    protected function handleMiddlewares(Request $request): ?Response
    {
        $middleware = current($this->middlewares);
        next($this->middlewares);

        return $middleware ? $middleware->process($request, $this) : null;
    }

    /**
     * @param Request $request
     * @param Route $route
     * @return Response
     */
    protected function handleRequest(Request $request, Route $route): Response
    {
        $actionClass = $route->getAction();

        return call_user_func([new $actionClass($this), 'handle'], $request);
    }

    /**
     * @param \Exception $e
     * @param Request $request
     * @return Response
     */
    protected function handleException(\Exception $e, Request $request): Response
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