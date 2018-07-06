<?php

namespace Core\Middleware;

use Core\App;
use Core\Http\Request;
use Core\Http\Response\Response;

/**
 * Interface MiddlewareInterface
 * @package Core\Middleware
 */
interface MiddlewareInterface
{
    /**
     * @param Request $request
     * @param App $app
     * @return Response
     */
    public function process(Request $request, App $app): Response;
}