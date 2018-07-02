<?php

namespace Core\Http\Exception;

/**
 * Interface HttpExceptionInterface
 * @package Core\Http\Exception
 */
interface HttpExceptionInterface
{
    /**
     * Return the status code.
     *
     * @return int
     */
    public function getStatusCode();
}
