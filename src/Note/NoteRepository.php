<?php

namespace App\Note;

use PDO;

class NoteRepository 
{
    private $pdo;

    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
    }
        
    function fetchNotes() 
    {
        $statement = $this->pdo->query("SELECT * FROM notes");
        return $statement->fetchAll(PDO::FETCH_CLASS, "App\\Note\\NoteModel");
    }

    function fetchNote($id) 
    {
        $statement = $this->pdo->prepare("SELECT * FROM `notes` WHERE id = :id");
        $statement->execute(['id' => $id]);

        $statement->setFetchMode(PDO::FETCH_CLASS, "App\\Note\\NoteModel");
        $note = $statement->fetch(PDO::FETCH_CLASS);

        return $note;
    }
    
    function saveNoteModel(NoteModel $note)
    {
        $statement = $this->pdo->prepare("INSERT INTO notes (title, content) VALUES (?,?)");
        return $statement->execute([$note->title, $note->content]);
    }

    function saveNote() 
    {
        $note = new NoteModel();
        $note->title = $_POST["title"];
        $note->content = $_POST["content"];
        return $this->saveNoteModel($note);
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
