<?php

namespace Middleware;

use Core\App;
use Core\Http\Exception\BadRequestHttpException;
use Core\Http\Request;
use Core\Http\Response\Response;
use Core\Middleware\MiddlewareInterface;
use Core\Routing\Route;

/**
 * Class JsonMiddleware
 * @package Middleware\Validation
 */
class JsonMiddleware implements MiddlewareInterface
{
    /**
     * @inheritdoc
     */
    public function process(Request $request, App $app): Response
    {
        if (
            $request->isMethod(Route::METHOD_POST, Route::METHOD_PUT) &&
            $request->getHeader('Content-Type') !== 'application/json'
        ) {
            throw new BadRequestHttpException('Content type has to be application/json');
        }

        return $app->handle($request);
    }
}