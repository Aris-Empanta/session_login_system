<?php

declare(strict_types=1);

require '../router/Router.php';

$router = new Router();

$router->get('', 'Home', 'render');

$router->get('home', 'Home', 'render');

$router->get('user/home{id}/{number}', 'Home', 'render');

$router->put('change', 'Home', 'render');

$router->run();