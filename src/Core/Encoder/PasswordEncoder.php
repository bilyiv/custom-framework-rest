<?php

namespace Core\Encoder;

/**
 * Class PasswordEncoder
 * @package Core\Encoder
 */
class PasswordEncoder implements PasswordEncoderInterface
{
    /**
     * @inheritdoc
     */
    public function encode(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @inheritdoc
     */
    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}