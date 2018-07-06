<?php

/**
 * Class Database
 */
class Database
{
    /**
     * @var \PDO
     */
    private static $instance;

    /**
     * @var string
     */
    public static $dsn = 'mysql:dbname=testdb;host=mysql';

    /**
     * @var string
     */
    public static $username = 'root';

    /**
     * @var string
     */
    public static $password = 'secret';

    private function __construct()
    {
    }

    /**
     * @return PDO
     */
    public static function getInstance(): \PDO
    {
        if (self::$instance == null) {
            self::$instance = new \PDO(self::$dsn, self::$username, self::$password);
        }

        return self::$instance;
    }
}