<?php


namespace App\Controllers;
use Router\Router;
use Libraries\BaseController;

class Logout extends BaseController
{

    private Router $request;

    public function __construct(Router $router)
    {
        $this->request = $router;   
    }

    public function logout()
    {
        if(isset($_POST['logout'])) {

            session_start();

            // Unset the session cookie
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600, '/');
            }
            session_unset();
            session_destroy();

            $this->redirect('/login');
        }        
    }
}