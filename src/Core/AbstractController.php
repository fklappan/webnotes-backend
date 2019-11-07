<?php

namespace App\Core;

abstract class AbstractController 
{
    protected function render($view, $params) 
    {
        // extract iteriert über den params array und erzeugt aus dem key eine variable mit dem wert von value
        // beispiel: es wird übergeben "note" => <note-objekt>. Extract erstellt dann eine Variable $note mit dem entsprechend note-objekt als wert
        // dies wird dann in der view verwendet ($note->content, $note->title, usw)
        extract($params);
        include __DIR__ . "/../../views/{$view}.php";
    }
}
?>