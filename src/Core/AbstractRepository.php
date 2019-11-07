<?php

namespace App\Core;

use PDO;

abstract class AbstractRepository {

    protected $pdo;

    public abstract function getTableName();

    public abstract function getModelName();

    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
    }

    public function all() 
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $statement = $this->pdo->query("SELECT * FROM $table");
        return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }

    public function find($id) 
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE id = :id");
        $statement->execute(['id' => $id]);

        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        $data = $statement->fetch(PDO::FETCH_CLASS);

        return $data;
    }
}

?>