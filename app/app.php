<?php

namespace App;

class App
{
    public function run()
    {
        //We import the config files
        require_once "../config/routes.php";   
        require "../config/constants.php";     

        //Handling a non existing uri from the client
        if($router->pageNotFound === true) {

            $pageNotFoundNamespace = CONTROLLERS_NAMESPACE . PAGE_NOT_FOUND;

            $controller = new $pageNotFoundNamespace();

            $action = PAGE_NOT_FOUND_ACTION;

            $controller->$action();

            return;
        }

        //We initialize the controller with its namespace depending the uri.
        $controllerNamespace = CONTROLLERS_NAMESPACE . $router->controller;

        $controller = new $controllerNamespace($router);

        $action = $router->action;

        //We run the controller's method needed depending the uri.
        $controller->$action();
    }
}