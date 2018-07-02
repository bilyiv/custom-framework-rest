<?php

namespace Action;

use Core\Http\Response\JsonResponse;
use Core\Http\Request;

/**
 * Class HelloAction
 * @package Action
 */
class HelloAction
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function handle(Request $request): JsonResponse
    {
        return new JsonResponse(['data' => 'Hello world']);
    }
}