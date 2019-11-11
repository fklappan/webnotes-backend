<?php

namespace App\User;

use App\Core\NoAuthException;

class LoginService 
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function attempt($username, $password) 
    {
        $user = $this->userRepository->findByUsername($username);
        if (empty($user)) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            $_SESSION['login'] = $user->name;
            // create new session id for next user?
            session_regenerate_id(true);
            return true;
        } else {
            return false;
        }

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