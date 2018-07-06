<?php

namespace Core;

use Core\Http\Response\JsonResponse;
use Core\Http\Request;

/**
 * Class AbstractAction
 * @package Action
 */
abstract class AbstractAction
{
    /**
     * @var App
     */
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public abstract function handle(Request $request);
}