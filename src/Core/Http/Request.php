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


    private $headers;

    /**
     * @var string|null
     */
    private $body;

    public function __construct()
    {
        $this->path = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->request = $_REQUEST;
        $this->query = $_GET;
        $this->headers = getallheaders();
        $this->body = stream_get_contents(fopen('php://input', 'r'));
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
     * @return array|false
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $name
     * @return null|string
     */
    public function getHeader(string $name): ?string {
        return $this->headers[$name] ?? null;
    }

    /**
     * @return string
     */
    public function getBody(): string
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

    /**
     * @param string[] ...$methods
     * @return bool
     */
    public function isMethod(string ...$methods): bool
    {
        return in_array($this->method, $methods);
    }
}