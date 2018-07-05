<?php

namespace Core\Routing;

use Core\Http\Exception\NotFoundHttpException;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface RouteMatcherInterface
 * @package Core\Routing
 */
interface RouteMatcherInterface
{
    /**
     * Tries to match a request with a set of routes.
     *
     * @param ServerRequestInterface $request
     *
     * @return Route
     *
     * @throws NotFoundHttpException
     */
    public function matchRequest(ServerRequestInterface $request): Route;
}
