<?php

namespace Core;

use Core\Http\Request;
use Core\Http\Response\Response;

/**
 * Interface AppInterface
 * @package Core
 */
interface AppInterface
{
    /**
     * Handle request and return response.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response;
}
