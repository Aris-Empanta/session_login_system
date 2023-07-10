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

        //We evaluate if the request uri exists as a key in the router array:
        foreach($this->routes as $key => $value) {

            //We remove the forward slashes "/" befor and after
            $uri = trim($_SERVER['REQUEST_URI'], '/');

            //we split the $uri of the client to an array
            $uriArray = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

            if($uri === $key) {
                echo $uri;
            } else {
                echo 'Not Found';
            }

            
        }
    }

    public function getAllRoutes(){
        return $this->routes;
      }
}