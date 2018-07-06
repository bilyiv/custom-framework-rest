<?php

namespace Validator;

use Core\Validator\ValidatorInterface;

/**
 * Class SignupValidator
 * @package Validator
 */
class SignupValidator implements ValidatorInterface
{
    /**
     * @inheritdoc
     */
    public function validate(array $data): bool
    {
        return isset($data['email']) && isset($data['password']);
    }
}