<?php

namespace Core\Routing;

/**
 * Class Route
 * @package Core\Routing
 */
class Route
{
    public const POST_METHOD = 'POST';
    public const GET_METHOD = 'GET';

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $action;

    /**
     * @var array
     */
    private $methods;

    public function __construct(string $path, string $action, ...$methods)
    {
        $this->path = $path;
        $this->action = $action;
        $this->methods = $methods;
    }

    /**
     * @param string $path
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $method
     * @return bool
     */
    public function hasMethod(string $method): bool
    {
        return in_array($method, $this->methods);
    }

    /**
     * @param array ...$parameter
     * @return mixed
     */
    public function __invoke(...$parameter)
    {
        return call_user_func([$this->action, 'handle'], ...$parameter);
    }
}