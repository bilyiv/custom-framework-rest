<?php

namespace Repository\Pdo;

use Core\Repository\PdoRepository;
use Entity\User;
use Repository\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package Repository\Mysql
 */
class UserRepository extends PdoRepository implements UserRepositoryInterface
{
    public function create(User $user): bool
    {
        $statement = $this->pdo->prepare('INSERT INTO `users`(email, password) VALUES (:email, :password)');
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());

        return $statement->execute();
    }

    public function findByEmail(string $email): ?User
    {
        $statement = $this->pdo->prepare('SELECT email, password FROM `users` WHERE email = ?');
        $statement->execute([$email]);

        if ($data = $statement->fetch(\PDO::FETCH_ASSOC)) {
            return (new User())
                ->setEmail($data['email'])
                ->setPassword($data['password']);
        }

        return null;
    }
}