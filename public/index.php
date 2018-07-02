<?php

use Core\{
    App,
    Http\Request,
    Routing\Router
};

require __DIR__.'/../vendor/autoload.php';

$router = new Router();
$router->addGet('/hello', \Action\HelloAction::class);

$app = new App($router);
$response = $app->handle(new Request());
$response->send();
