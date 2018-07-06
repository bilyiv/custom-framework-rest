<?php

namespace Migration;

use Core\Migration\MigrationInterface;

/**
 * Class CreateUsersTable
 * @package Migration
 */
class CreateUsersTable implements MigrationInterface
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @inheritdoc
     */
    public function up(): bool
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS `users` (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , email VARCHAR(60) NOT NULL, password VARCHAR(60) NOT NULL)");

        return true;
    }

    /**
     * @inheritdoc
     */
    public function down(): bool
    {
        $this->pdo->exec("DROP TABLE IF EXISTS `users`");

        return true;
    }
}