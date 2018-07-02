<?php

namespace Core\Http\Exception;

/**
 * Class NotFoundHttpException
 * @package Core\Http\Exception
 */
class NotFoundHttpException extends HttpException
{
    public function __construct(string $message = "Not Found", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct(404, $message, $code, $previous);
    }
}