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
        if (isset($_POST['login']) && !empty($username) && !empty($password)) {

            if($username === "john" && $password === 'doe') {

                $sessionSavePath = dirname(__DIR__) . '/sessions';
                
                if (!is_dir($sessionSavePath)) {
                    mkdir($sessionSavePath);
                }
                session_save_path($sessionSavePath);
                
                session_start();
                $_SESSION['username'] = $username;

                $this->redirect('home');
                return;
            } 

            $this->wrongCredentials = 'Your username or password is incorrect!';
            $this->renderView('login');
            return;
        }

        $this->wrongCredentials = 'Please fillup the credential areas!';
                        
        $this->renderView('login');
        return;
    }
}