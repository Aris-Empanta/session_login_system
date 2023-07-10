<?php

declare(strict_types=1);

require_once '../src/Router.php';

$router = new Router();

//$uri = trim($_SERVER['REQUEST_URI'], '/');

$uri = $_SERVER['REQUEST_URI'];

$router->get('', 'Home', 'render');

$router->get('home', 'Home', 'render');

$router->run();