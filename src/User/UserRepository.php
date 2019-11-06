<?php

namespace App\User;

use PDO;

class UserRepository 
{
    private $pdo;

    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
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

    function saveNote() 
    {
        $user = new UserModel();
        $user->name = $_POST["name"];
        $user->password = $_POST["password"];
        return $this->saveUserModel($user);
    }

    function updateNote() 
    {
        $note = new NoteModel();
        $note->id = $_POST["id"];
        $note->title = $_POST["title"];
        $note->content = $_POST["content"];
        $statement = $this->pdo->prepare("UPDATE notes SET title=?, content=? WHERE id =?");
        $statement->execute([$note->title, $note->content, $note->id]);
    }

    function deleteNote() 
    {
        $id = $_GET["id"];
        $statement = $this->pdo->prepare("DELETE FROM notes WHERE id = :id");
        return $statement->execute(['id' => $id]);
    }
}
