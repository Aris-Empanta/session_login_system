<?php



class Router
{
    private array $routes;

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

    public function run() {

        //We evaluate is the request uri exists as a key in the router array:
        foreach($this->routes as $route) {

            $uri = trim($_SERVER['REQUEST_URI'], '/');

            //we split the $uri parts to an array
            $uriArray = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

            //We do the same for the $route in the $routes array that we compare
            $routeArray = explode('/', $route);
        }
    }

    public function getAllRoutes(){
        return $this->routes;
      }
}