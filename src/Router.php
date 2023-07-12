<?php



class Router
{
    private array $routes;

    //The router params to be filled
    protected array $params;

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

        //We examine each registered route one by one
        foreach($this->routes as $key => $value) {


            //We remove the forward slashes "/" befor and after
            $uri = trim($_SERVER['REQUEST_URI'], '/');

            // first we check if the route exists (sanitised and case insensitive).
            if($uri === $key) {
                echo $uri;
                return;
            }
            
            //We check if it matches, e.g. '/user/{id}/name{id}
            else if(preg_match_all('/{(\w+)}/', $key, $matches)) {

                //We replace the {} part with capturing naming group.
                $pattern = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $key);
                
                //We concatonate the pattern and assign it to the route
                $routePattern = "#^$pattern$#";

                //We now check if it matches the $uri
                if (preg_match($routePattern, $uri, $matches)) {

                    //From the matches array, we keep only the string keys, which are the params.
                    foreach ($matches as $key => $value) {
                        if (is_string($key)) {
                            $this->params[$key] = $value;
                        }
                    }
                    return;
                }
            }
                     
        }

        echo 'Not Found';
    }

    public function getAllRoutes(){
        return $this->routes;
      }
}