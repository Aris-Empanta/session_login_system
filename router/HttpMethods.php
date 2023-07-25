<?php

namespace Router;

trait HttpMethods 
{    
    //We populate the routes array depending the HTTP method.
    public function get($uri, $controller, $action ) {

        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;
 
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->routes[$uri] = [
                'method' => 'GET',
                'controller' => $controller,
                'action' => $action,
                'middleware' => $this->getMiddlewareArray()
            ];
        }

        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function post($uri, $controller, $action ) {

        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->routes[$uri] = [
                'method' => 'POST',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function put($uri, $controller, $action ) {
       
        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $this->routes[$uri] = [
                'method' => 'PUT',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function patch($uri, $controller, $action ) {
        
        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'PATCH') {
            $this->routes[$uri] = [
                'method' => 'PATCH',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function delete($uri, $controller, $action ) {
        
        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->routes[$uri] = [
                'method' => 'DELETE',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function head($uri, $controller, $action ) {

        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'HEAD') {
            $this->routes[$uri] = [
                'method' => 'HEAD',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function options($uri, $controller, $action ) {

        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $this->routes[$uri] = [
                'method' => 'OPTIONS',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function trace($uri, $controller, $action ) {
        
        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'TRACE') {
            $this->routes[$uri] = [
                'method' => 'TRACE',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }

    public function all($uri, $controller, $action ) {
        
        //We add the prefix (if exists) to the uri.
        $uri = $this->getPrefix() . $uri;

        if($_SERVER['REQUEST_METHOD'] === 'ANY') {
            $this->routes[$uri] = [
                'method' => 'ANY',
                'controller' => $controller,
                'action' => $action
            ];
        }
        
        /*
            If the method does not belong to a prefix group, we empty the
            middleware callbacks array, otherwise it is handled by the grouping 
            method 
        */
        if($this->groupedRoutes === false)
            $this->resetMiddlewareArray();

    }
}