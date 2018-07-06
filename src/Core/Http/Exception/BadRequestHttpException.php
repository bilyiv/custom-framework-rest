<?php

namespace Core\Http\Exception;

/**
 * Class BadRequestHttpException
 * @package Core\Http\Exception
 */
class BadRequestHttpException extends HttpException
{
    public function __construct(string $message = "Bad request", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct(400, $message, $code, $previous);
    }
}