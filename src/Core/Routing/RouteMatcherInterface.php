<?php

namespace Core\Routing;

use Core\Http\Exception\NotFoundHttpException;
use Core\Http\Request;

/**
 * Interface RouteMatcherInterface
 * @package Core\Routing
 */
interface RouteMatcherInterface
{
    /**
     * Tries to match a request with a set of routes.
     *
     * @param Request $request
     *
     * @return Route
     *
     * @throws NotFoundHttpException
     */
    public function matchRequest(Request $request): Route;
}
