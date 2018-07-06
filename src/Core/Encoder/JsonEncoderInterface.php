<?php

namespace Core\Encoder;

/**
 * Interface JsonEncoderInterface
 * @package Core\Encoder
 */
interface JsonEncoderInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function encode(array $data): string;

    /**
     * @param string $data
     * @return array
     */
    public function decode(string $data): array;
}