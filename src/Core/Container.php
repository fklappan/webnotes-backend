<?php

namespace App\Core;

use PDO;
use PDOException;
use App\Note\NoteRepository;
use App\Note\NoteController;
use App\User\LoginController;
use App\User\LoginService;
use App\User\UserRepository;

class Container  
{
    private $instanceFactory = [];
    
    private $instances = [];

    private $config = [];

    public function __construct($config)
    {
        $this->config = $config;
        $this->instanceFactory = [
            "noteRepository" => function() {
                return new NoteRepository($this->make("pdo"));
            },
            "userRepository" => function() {
                return new UserRepository($this->make("pdo"));
            },
            "pdo" => function() {
                return $this->createPdo();                
            },
            "noteController" => function() {
                return new NoteController($this->make("noteRepository"), $this->make("loginService"));
            },
            "loginController" => function() {
                return new LoginController($this->make("loginService"));
            },
            "loginService" => function() {
                return new LoginService($this->make("userRepository"));
            }
        ];
    }

    private function createPdo() 
    {
        try {
            $pdoString = "mysql:host=" . $this->config["db_host"] . ";dbname=" . $this->config["db_name"] . ";charset=utf8";
            $pdo = new PDO(
                $pdoString, 
                $this->config["db_user"], 
                $this->config["db_password"]);
            // sicherheitsfeature wegen sql injection. 
            // Siehe https://stackoverflow.com/questions/134099/are-pdo-prepared-statements-sufficient-to-prevent-sql-injection/12202218#12202218
        } catch (PDOException $e) {
            echo "Verbindung zur Datenbank fehlgeschlagen!";
            die();
        }
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }

    public function make($objectName) 
    {
        if (!empty($this->instances[$objectName])) {
            return $this->instances[$objectName];
        }

        if (isset($this->instanceFactory[$objectName])) {
            $this->instances[$objectName] = $this->instanceFactory[$objectName]();
        }
        
        return $this->instances[$objectName];
    }
}

?>