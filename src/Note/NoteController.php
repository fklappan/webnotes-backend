<?php

namespace App\Note;

class NoteController 
{
    private $noteRepository;
    private $version;

    public function __construct(NoteRepository $noteRepository, $version)
    {
        $this->noteRepository = $noteRepository;
        $this->version = $version;
    }

    protected function render($view, $params) 
    {
        // foreach ($params as $key => $value) {
        //     // erstelle eine variable mit dem name $key (deswegen ${$key}) mit dem wert
        //     ${$key} = $value;
        // }
        // -> PHP hat dafür die Methode extract() - macht den oben auskommentierten code
        extract($params);
        $version = $this->version;
        include __DIR__ . "/../../views/layout/header.php";
        include __DIR__ . "/../../views/{$view}.php";
        include __DIR__ . "/../../views/layout/footer.php";
    }

    public function index() 
    {
        $notes = $this->noteRepository->fetchNotes();
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
        $note = $this->noteRepository->fetchNote($id);
        $this->render("note/note", [
            "note" => $note
        ]);
    }

    public function editNote() 
    {
        $id = $_GET["id"];
        $note = $this->noteRepository->fetchNote($id);
        $this->render("note/edit", [
            "note" => $note
        ]);
    }
}

?>