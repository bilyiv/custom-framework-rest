<?php

namespace Core\Encoder;

use Core\Encoder\Exception\DecodeException;
use Core\Encoder\Exception\EncodeException;

/**
 * Class JsonEncoder
 * @package Core\Encoder
 */
class JsonEncoder implements JsonEncoderInterface
{
    /**
     * @inheritdoc
     */
    public function encode(array $data): string
    {
        $json = json_encode($data);
        if ($json === false) {
            throw new EncodeException();
        }

        return $json;
    }

    /**
     * @inheritdoc
     */
    public function decode(string $json): array
    {
        $data = json_decode($json, true);
        if ($json === null) {
            throw new DecodeException();
        }

        return $data;
    }
}