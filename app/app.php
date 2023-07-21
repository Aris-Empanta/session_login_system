<?php

require '../router/Router.php';

class App
{
    public function run()
    {
        $router = new Router();

        $router->get('', 'Home', 'render');

        $router->get('home', 'Home', 'render');

        $router->get('user/home{id}/{number}', 'Dome', 'render');

        $router->put('change', 'Home', 'render');

        $router->run();
    }
}