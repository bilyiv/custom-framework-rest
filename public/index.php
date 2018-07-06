<?php

use Core\{App, Http\Request, Routing\Router};

require __DIR__.'/../vendor/autoload.php';

$pdo = new \PDO('mysql:dbname=testdb;host=127.0.0.1', 'root', 'secret');

$router = new Router();
$router->addGet('/', \Action\HelloAction::class);
$router->addPost('/signup', \Action\SignupAction::class);
$router->addPost('/signin', \Action\SigninAction::class);

$app = new App($router, $pdo);
$app->addMiddleware(new \Middleware\JsonMiddleware());
$response = $app->handle(new Request());
$response->send();
