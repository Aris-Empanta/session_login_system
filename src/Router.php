<?php



class Router
{
    private array $routes;

    //The router params to be filled
    protected array $params;

    protected array $queryParams;

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

         //We remove the forward slashes "/" befor and after
         $initialUri = trim($_SERVER['REQUEST_URI'], "/");

         //echo $initialUri;

         //We remove any queries from the client's uri if they exist and remove the slashes before and after
         $uri = trim(preg_replace('/\w+\?\w+=\w+(&\w+=\w+)*$/' ,'', $initialUri), '/');
         
         //we isolate the query string without the first part (word?)
         $queryString = preg_replace('/\w+\?/', '', str_replace($uri.'/', '', $initialUri));
         $queryArray = explode('&',$queryString);
         

         foreach($queryArray as $query) {

            $keyValuePair = explode('=', $query);

            $this->queryParams[$keyValuePair[0]] = $keyValuePair[1];
         }

         print_r($this->queryParams);
        //echo $uri;

        //We examine each registered route one by one
        foreach($this->routes as $key => $value) {          

            // first we check if the route exists (sanitised and case insensitive).
            if($uri === $key) {
          //      echo $uri;
               // $this->handleQuery();
                return;
            }
            
            //We check if it matches, e.g. '/user/{id}/name{id}
            if(preg_match_all('/{(\w+)}/', $key, $matches)) {

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
    }

    private function handleQuery($uri){
    }

    public function getAllRoutes(){
        return $this->routes;
    }
}