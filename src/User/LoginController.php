<?php

namespace App\User;

use App\Core\AbstractController;

class LoginController extends AbstractController
{
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;      
    }
 
    public function login()
    {
        $error = null;
        if( !empty($_POST['username']) AND !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->loginService->attempt($username, $password)) {
                header(("Location: index"));
            } else {
                $error = "Can not log in. Either user name or password is wrong or user does not exist.";
            }
        } 
        
        $this->render("user/login", [
            'error' => $error
        ]);
    }

    public function logout() 
    {
        $this->loginService->logout();
        header("Location: login");    
    }

}
?>