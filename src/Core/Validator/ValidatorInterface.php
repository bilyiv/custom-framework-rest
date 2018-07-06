<?php

namespace Core\Validator;

/**
 * Interface ValidatorInterface
 * @package Core\Middleware
 */
interface ValidatorInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool;
}