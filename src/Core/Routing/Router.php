<?php

namespace Core\Routing;

use Core\Http\Request;
use Core\Http\Exception\NotFoundHttpException;

/**
 * Class Router
 * @package Core\Routing
 */
class Router implements RouteMatcherInterface
{
    /**
     * @var array Route[]
     */
    private $routes;

    /**
     * @param string $path
     * @param string $callback
     * @return Router
     */
    public function addGet(string $path, string $callback): self
    {
        $this->add($path, $callback, Route::METHOD_GET);

        return $this;
    }

    /**
     * @param string $path
     * @param string $callback
     * @return Router
     */
    public function addPost(string $path, string $callback): self
    {
        $this->add($path, $callback, Route::METHOD_POST);

        return $this;
    }

    /**
     * @param string $path
     * @param string $callback
     * @param string[] ...$methods
     * @return Router
     */
    public function add(string $path, string $callback, string ...$methods): self
    {
        $this->addRoute(new Route($path, $callback, ...$methods));

        return $this;
    }

    /**
     * @param Route $route
     * @return self
     */
    public function addRoute(Route $route): self
    {
        $this->routes[] = $route;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function matchRequest(Request $request): Route
    {
        foreach ($this->routes as $route) {
            if ($route->getPath() === $request->getPath() && $route->hasMethod($request->getMethod())) {
                return $route;
            }
        }

        throw new NotFoundHttpException();
    }

}