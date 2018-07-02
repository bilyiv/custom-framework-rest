<?php

namespace Core\Http;

/**
 * Class Request
 * @package Core\Http
 */
class Request
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $method;

    public function __construct()
    {
        $this->path = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return rtrim($this->path, '/');
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}