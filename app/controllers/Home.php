<?php

namespace App\Controllers;
use Router\Router;
use Libraries\BaseController;

class Home extends BaseController
{

    private Router $request;

    public function __construct(Router $router)
    {
        $this->request = $router;   
    }

    public function view()
    {
        
        $this->renderView('home');
    }
}