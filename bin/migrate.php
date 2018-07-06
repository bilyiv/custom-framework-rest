<?php

require __DIR__.'/../vendor/autoload.php';

try {
    (new Migration\CreateUsersTable(Database::getInstance()))->up();

    echo 'Migrations successfully run.' . PHP_EOL;
} catch (\Exception $exception) {
    echo $exception->getMessage();
}