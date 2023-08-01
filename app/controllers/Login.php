<?php

namespace App\Controllers;
use Router\Router;
use Libraries\BaseController;

class Login extends BaseController
{

    private Router $request;
    public string $wrongCredentials = "";

    public function __construct(Router $router)
    {
        $this->request = $router;   
    }

    public function view()
    {
        $this->wrongCredentials = "";
        $this->renderView('login');
    }

    public function validateCredentials()
    {        
        $username = $this->request->formBody['username'];
        $password = $this->request->formBody['password'];

        //The following code will be executed only if we submit the form
        if (isset($_POST['login'])) {

            if(!empty($username) && !empty($password)) {
            
                $this->redirect('home');
                return;
            } else {
                $this->wrongCredentials = 'Please fillup the credential areas!';
            }

            
            $this->renderView('login');
            return;
        }
    }
}