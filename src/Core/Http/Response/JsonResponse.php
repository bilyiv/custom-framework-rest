<?php

namespace Core\Http\Response;

/**
 * Class JsonResponse
 * @package Core\Http\Response
 */
class JsonResponse extends Response
{
    public function __construct($content, int $statusCode = 200, array $headers = [])
    {
        $headers += ['Content-type' => 'application/json'];

        parent::__construct(json_encode($content), $statusCode, $headers);
    }
}