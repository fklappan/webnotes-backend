<?php

namespace App\Note;

use App\Core\AbstractController;

class NoteController extends AbstractController
{
    private $noteRepository;
    private $version;

    public function __construct(NoteRepository $noteRepository, $version)
    {
        $this->noteRepository = $noteRepository;
        $this->version = $version;
    }

    public function index() 
    {
        $notes = $this->noteRepository->fetchNotes();
        $this->render("note/index", [
            "notes" => $notes,
            "version" => $this->version
        ]);
    }

    public function addNote() 
    {
        $this->render("note/add", [
            "version" => $this->version
        ]);
    }

    public function showPost($id) 
    {
        $note = $this->noteRepository->fetchNote($id);
        $this->render("note/note", [
            "note" => $note,
            "version" => $this->version
        ]);
    }

    public function editNote() 
    {
        $id = $_GET["id"];
        $note = $this->noteRepository->fetchNote($id);
        $this->render("note/edit", [
            "note" => $note,
            "version" => $this->version
        ]);
    }
}

?>