<?php

namespace Core\Http\Exception;

use Throwable;

/**
 * Class HttpException
 * @package Core\Http\Exception
 */
class HttpException extends \Exception implements HttpExceptionInterface
{
    /**
     * @var int
     */
    private $statusCode;

    public function __construct(int $statusCode, string $message = "", int $code = 0, Throwable $previous = null)
    {
        $this->statusCode = $statusCode;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}