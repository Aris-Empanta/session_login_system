<?php

namespace App;

class App
{
    public function run()
    {
        //We import the config files
        require_once "../config/routes.php";   
        require "../config/constants.php";     

        //We initialize the controller with its namespace depending the uri.
        $controllerNamespace = CONTROLLERS_NAMESPECE . $router->controller;

        $controller = new $controllerNamespace($router);

        $action = $router->action;

        //We run the controller's method needed depending the uri.
        $controller->$action();
    }
}