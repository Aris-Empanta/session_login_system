<?php

namespace App;
use Router\Router;

class App
{
    public function run()
    {
        $router = new Router();

        $router->get('', 'Home', 'render');

        $router->get('home', 'Home', 'render');

        $router->get('user/home{id}/{number}', 'Home', 'renderParams');

        $router->put('change', 'Home', 'render');

        $router->configure();

        $activeController = $router->controller;

        $action = $router->action;

        $controllerNamespace = "App\\Controllers\\" . $activeController;

        $controller = new $controllerNamespace($router);

        $controller->$action();
    }
}