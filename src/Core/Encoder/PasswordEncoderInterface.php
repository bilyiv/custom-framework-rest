<?php

namespace Core\Encoder;

/**
 * Interface PasswordEncoderInterface
 * @package Core\Encoder
 */
interface PasswordEncoderInterface
{
    /**
     * @param string $password
     * @return string
     */
    public function encode(string $password): string;

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function verify(string $password, string $hash): bool;
}