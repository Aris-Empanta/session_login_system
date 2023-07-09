<?php

declare(strict_types=1);

require_once '../src/Router.php';

$router = new Router();

$uri = trim($_SERVER['REQUEST_URI'], '/');

echo $uri;

print_r(explode('/', $uri));

$router->get('home', 'Home', 'render');

$router->run();

print_r($router->getAllRoutes());