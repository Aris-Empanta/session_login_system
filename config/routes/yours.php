<?php

$router->setPrefix('yours')->group([
    $router->get('/home', 'Home', 'render'),
    $router->get('/about', 'Home', 'render')
]);