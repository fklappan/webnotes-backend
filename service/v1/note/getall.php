<?php
header("Access-Control-Allow-Origin: *");
include ("../../../init.php");
$noteRepository = $container->make("noteRepository");
$notes = $noteRepository->fetchNotes();
echo json_encode($notes);
?>