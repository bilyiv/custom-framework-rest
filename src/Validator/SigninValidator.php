<?php

namespace Validator;

use Core\Validator\ValidatorInterface;

/**
 * Class SigninValidator
 * @package Validator
 */
class SigninValidator implements ValidatorInterface
{
    /**
     * @inheritdoc
     */
    public function validate(array $data): bool
    {
        return isset($data['email']) && isset($data['password']);
    }
}