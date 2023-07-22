<?php

namespace App\Controllers;
use Router\Router;

class Home
{

    private Router $request;

    public function __construct(Router $router)
    {
        $this->request = $router;   
    }

    public function render(){
        echo "hi";
    }

    
    public function renderParams(){
        
        print_r($this->request->params);
    }
}