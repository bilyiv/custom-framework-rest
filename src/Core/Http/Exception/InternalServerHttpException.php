<?php

namespace Core\Http\Exception;

/**
 * Class InternalServerHttpException
 * @package Core\Http\Exception
 */
class InternalServerHttpException extends HttpException
{
    public function __construct(string $message = "Internal server error", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct(500, $message, $code, $previous);
    }
}