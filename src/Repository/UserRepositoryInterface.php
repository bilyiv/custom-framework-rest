<?php

namespace Repository;

use Entity\User;

/**
 * Interface UserRepositoryInterface
 * @package Repository
 */
interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool;

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email): ?User;
}