<?php


trait HttpMethods 
{
    
    //We populate the routes array depending the HTTP method.
    public function get($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->routes[$uri] = [
                'method' => 'GET',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function post($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->routes[$uri] = [
                'method' => 'POST',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function put($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $this->routes[$uri] = [
                'method' => 'PUT',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function patch($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'PATCH') {
            $this->routes[$uri] = [
                'method' => 'PATCH',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function delete($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->routes[$uri] = [
                'method' => 'DELETE',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function head($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'HEAD') {
            $this->routes[$uri] = [
                'method' => 'HEAD',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function options($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $this->routes[$uri] = [
                'method' => 'OPTIONS',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function trace($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'TRACE') {
            $this->routes[$uri] = [
                'method' => 'TRACE',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }

    public function all($uri, $controller, $action ) {

        if($_SERVER['REQUEST_METHOD'] === 'ANY') {
            $this->routes[$uri] = [
                'method' => 'ANY',
                'controller' => $controller,
                'action' => $action
            ];
        }
    }
}