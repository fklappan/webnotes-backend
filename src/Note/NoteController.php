<?php

namespace App\Note;

use App\Core\AbstractController;
use App\User\LoginService;

class NoteController extends AbstractController
{
    private $noteRepository;

    public function __construct(NoteRepository $noteRepository, LoginService $loginService)
    {
        $this->noteRepository = $noteRepository;
        $this->loginService = $loginService;
    }

    public function index() 
    {
        $this->loginService->check();

        $notes = $this->noteRepository->all();
        $this->render("note/index", [
            "notes" => $notes, 
            "activeSession" => true
        ]);
    }

    public function addNote() 
    {
        $this->loginService->check();

        $this->render("note/add", [
            "activeSession" => true
        ]);
    }

    public function showPost($id) 
    {
        $this->loginService->check();

        $note = $this->noteRepository->find($id);
        $this->render("note/note", [
            "note" => $note
        ]);
    }

    public function editNote() 
    {
        $this->loginService->check();

        $id = $_GET["id"];
        $note = $this->noteRepository->find($id);
        $this->render("note/edit", [
            "note" => $note,
            "activeSession" => true
        ]);
    }
}

?>