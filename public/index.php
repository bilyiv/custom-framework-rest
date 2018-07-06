<?php

use Core\{App, Http\Request, Routing\Router};

require __DIR__.'/../vendor/autoload.php';

$router = new Router();
$router->addGet('/', \Action\HelloAction::class);
$router->addPost('/signup', \Action\SignupAction::class);
$router->addPost('/signin', \Action\SigninAction::class);

$app = new App($router, Database::getInstance());
$app->addMiddleware(new \Middleware\JsonMiddleware());
$response = $app->handle(new Request());
$response->send();
