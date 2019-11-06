<?php
include ("../../../init.php");
$noteRepository = $container->make("noteRepository");
//var_dump($_GET);
$note = $noteRepository->fetchNote($_GET["id"]);
//var_dump($note);
header('Content-Type: application/json');
echo json_encode($note);
?>