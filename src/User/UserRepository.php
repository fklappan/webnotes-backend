<?php

namespace App\User;

use App\Core\AbstractRepository;
use PDO;

class UserRepository extends AbstractRepository
{
    public function getTableName()
    {
        return "users";
    }

    public function getModelName()
    {
        return "App\\User\\UserModel";
    }
    
    function fetchUsers() 
    {
        $statement = $this->pdo->query("SELECT * FROM users");
        return $statement->fetchAll(PDO::FETCH_CLASS, "App\\User\\UserModel");
    }

    function findByUsername($username) 
    {
        $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE name = :username");
        $statement->execute(['username' => $username]);

        $statement->setFetchMode(PDO::FETCH_CLASS, "App\\User\\UserModel");
        $user = $statement->fetch(PDO::FETCH_CLASS);

        return $user;
    }
    
    function saveUserModel(UserModel $user)
    {
        $statement = $this->pdo->prepare("INSERT INTO users (name, password) VALUES (?,?)");
        return $statement->execute([$user->name, $user->password]);
    }
}
