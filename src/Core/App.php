<?php

namespace Core;

use Core\Http\Exception\HttpExceptionInterface;
use Core\Http\Exception\NotFoundHttpException;
use Core\Http\Request;
use Core\Http\Response\Response;
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

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @inheritdoc
     */
    public function handle(Request $request): Response
    {
        try {
            $response =  $this->handleRequest($request);
        } catch (\Exception $e) {
            $response = $this->handleException($e, $request);
        }

        return $response;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws NotFoundHttpException
     */
    protected function handleRequest(Request $request): Response
    {
        $route = $this->router->matchRequest($request);

        $response = $route($request);

        return $response;
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