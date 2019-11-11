<?php

namespace App\User;

use App\Core\NoAuthException;

class LoginService 
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // this method is used within the web app (browser). Tries to login the user with provided credentials
    // and regenerates session id
    public function attempt($username, $password) 
    {
        $result = $this->genericAttempt($username, $password);
        // create new session id for next user?
        session_regenerate_id(true);
        return $result;
    }

    // this is a generic auth method used both by the browser method and the rest api method to 
    // authenticate a user. returns true if user was authenticated, otherwise returns false
    public function genericAttempt($username, $password) 
    {
        $user = $this->userRepository->findByUsername($username);
        if (empty($user)) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            $_SESSION['login'] = $user->name;
            return true;
        } else {
            return false;
        }
    }

    // this is the auth method used by the rest api. it is a naive approach and needs to be
    // refactored. 
    public function attemptRestService() 
    {
        if (!isset(getallheaders()['user']) || !isset(getallheaders()['password'])) {
            throw new NoAuthException("No user or password provided!");
        }
        $username = getallheaders()['user'];
        $password = getallheaders()['password'];
        $this->genericAttempt($username, $password);
        $this->check();
    }

    public function logout() 
    {
        unset($_SESSION['login']);
        session_regenerate_id(true);
    }

    public function check() 
    {
        if(isset($_SESSION['login'])) {
            return true;
        } else {
            throw new NoAuthException("No active session");
        }
    }



}