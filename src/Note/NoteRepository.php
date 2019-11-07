<?php

namespace App\Note;

use App\Core\AbstractRepository;
use PDO;

class NoteRepository extends AbstractRepository
{
    public function getTableName()
    {
        return "notes";
    }

    public function getModelName()
    {
        return "App\\Note\\NoteModel";
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
