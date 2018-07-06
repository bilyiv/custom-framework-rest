<?php

namespace Core\Repository;

/**
 * Class PdoRepository
 * @package Core\Repository
 */
abstract class PdoRepository
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}