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

    /**
     * @var array
     */
    private $request;

    /**
     * @var array
     */
    private $query;

    /**
     * @var array
     */
    private $body;

    public function __construct()
    {
        $this->path = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->request = $_REQUEST;
        $this->query = $_GET;
        $this->body = $_POST;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function get(string $name)
    {
        return $this->request[$name] ?? null;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
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