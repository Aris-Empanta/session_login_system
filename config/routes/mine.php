<?php

//We need to put the middleware functions (array) as a property to all the routes of the group
//or a single route. first, create an array named middleware.

$router->setPrefix('mine')->group([
    $router->get('', 'Home', 'render'),
    $router->get('/user/home{id}/{number}', 'Home', 'renderParams'),
    $router->put('/change', 'Home', 'render')
]);