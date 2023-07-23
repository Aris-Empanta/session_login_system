<?php

use Router\Router;

$router = new Router();

$router->get('', 'Home', 'render');

$router->get('home', 'Home', 'render');

$router->get('user/home{id}/{number}', 'Home', 'renderParams');

$router->put('change', 'Home', 'render');

$router->configure();