<?php

$router->setPrefix('mine')->group([
    $router->get('', 'Home', 'render'),
    $router->get('/user/home{id}/{number}', 'Home', 'renderParams'),
    $router->put('/change', 'Home', 'render')
]);