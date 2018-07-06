<?php

namespace Core\Routing;

/**
 * Class Route
 * @package Core\Routing
 */
class Route
{
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_GET = 'GET';
    public const METHOD_DELETE = 'DELETE';

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
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}