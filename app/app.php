<?php

namespace App;
use Libraries\ErrorHandler;
            
class App
{
    public function run()
    {
        //We import the config files
        require_once dirname(__DIR__) . "/config/routes.php";   
        require dirname(__DIR__) . "/config/constants.php";           

        //Handling non-fatal errors
        set_error_handler([ErrorHandler::class, 'handleNonFatalErrors']);

        //Handling fatal errors
        register_shutdown_function([ErrorHandler::class, 'handleFatalErrors']);

        
        if(preg_match('/.css$/', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI']))
            return;

        //Handling a non existing uri from the client
        if($router->pageNotFound === true) {

            $pageNotFoundNamespace = ERROR_CONTROLLERS_NAMESPACE . PAGE_NOT_FOUND;

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