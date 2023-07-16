<?php

require 'HttpMethods.php';

class Router
{
    use HttpMethods;
    
    //The array of all registered routes
    protected array $routes = [];

    //The params of the current route
    protected array $params = [];

    //the query params of the current route
    protected array $queryParams = [];

    //The variable to ckeck if it is a uri with params.
    private bool $uriHasParams = false;

    private function handleBasicRoute($uri) {
        
        echo $uri;
    }

    private function evaluateParamsUri($key, $uri) {

        //We replace the {} part with capturing naming group.
        $pattern = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $key);
                        
        //We concatonate the pattern and assign it to the route
        $routePattern = "#^$pattern$#";

        //We now check if it matches the $uri and the request method
        if (preg_match($routePattern, $uri, $matches) && $_SERVER['REQUEST_METHOD']) {

            //From the matches array, we keep only the string keys, which are the params.
            foreach ($matches as $key => $value) {
                if (is_string($key)) {
                    $this->params[$key] = $value;
                }
            }

            $this->uriHasParams = true;
        }
    }

    private function extractQueryParams($initialUri, $uri) {

        //we isolate the query string without the first part (word?)
        if(preg_match('/\w+\?\w+=\w+(&\w+=\w+)*$/', $initialUri)) {

            $queryString = preg_replace('/\w+\?/', '', str_replace($uri.'/', '', $initialUri));
            $queryArray = explode('&',$queryString);
        

         foreach($queryArray as $query) {

            $keyValuePair = explode('=', $query);

            $this->queryParams[$keyValuePair[0]] = $keyValuePair[1];
          }
          print_r($this->queryParams);
        }
    }

    public function run() {

        //We remove the forward slashes "/" before and after.
        $initialUri = trim($_SERVER['REQUEST_URI'], "/");

        //We remove any queries from the client's uri if they exist and remove the slashes before and after.
        $uri = trim(preg_replace('/\w+\?\w+=\w+(&\w+=\w+)*$/' ,'', $initialUri), '/');
        
        // If there are query params, we extract them and put the in the queryParams array.
        $this->extractQueryParams($initialUri, $uri);         

        //We examine each registered route one by one
        foreach($this->routes as $key => $value) {          

            // first we check if the route exists (sanitised and case insensitive).
            if($uri === $key) {
              if($value['method'] === $_SERVER['REQUEST_METHOD']) {  

                $this->handleBasicRoute($uri);
                return;
              }
            }
            
            //We check if it matches, e.g. '/user/{id}/name{id}. If 
            //it is true, we check if the current uri corresponds to the 
            //registered one.
            if(preg_match_all('/{(\w+)}/', $key, $matches)) {
                
                $this->evaluateParamsUri($key, $uri);                 
            }    
            
            //If it matched a uri with params, we stop the method from further executing.
            if($this->uriHasParams)
                return;
        }
        echo 'Not Found';
    }
}