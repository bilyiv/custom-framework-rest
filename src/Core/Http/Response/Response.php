<?php

namespace Core\Http\Response;

/**
 * Class Response
 * @package Core\Http\Response
 */
class Response
{
    use ResponseDataTrait;

    /**
     * @var string
     */
    private $protocolVersion = '1.1';

    public function __construct(string $content = '', int $statusCode = 200, array $headers = [])
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * Sends HTTP headers and content.
     */
    public function send(): void
    {
        // headers.
        foreach ($this->headers as $name => $value) {
            header($name.': '.$value, false, $this->statusCode);
        }

        // status
        header(sprintf('HTTP/%s %s', $this->protocolVersion, $this->statusCode), true, $this->statusCode);

        // content
        echo $this->content;
    }
}