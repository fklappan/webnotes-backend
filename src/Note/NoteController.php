<?php

namespace App\Note;

use App\Core\AbstractController;

class NoteController extends AbstractController
{
    private $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function index() 
    {
        $notes = $this->noteRepository->all();
        $this->render("note/index", [
            "notes" => $notes
        ]);
    }

    public function addNote() 
    {
        $this->render("note/add", []);
    }

    public function showPost($id) 
    {
        $note = $this->noteRepository->find($id);
        $this->render("note/note", [
            "note" => $note
        ]);
    }

    public function editNote() 
    {
        $id = $_GET["id"];
        $note = $this->noteRepository->find($id);
        $this->render("note/edit", [
            "note" => $note
        ]);
    }
}

?>