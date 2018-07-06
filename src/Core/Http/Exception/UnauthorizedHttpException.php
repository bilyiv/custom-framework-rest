<?php

namespace Core\Http\Exception;

/**
 * Class UnauthorizedHttpException
 * @package Core\Http\Exception
 */
class UnauthorizedHttpException extends HttpException
{
    public function __construct(string $message = "Unauthorized", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct(401, $message, $code, $previous);
    }
}