<?php
header("Access-Control-Allow-Origin: *");
include ("../../../init.php");
$noteRepository = $container->make("noteRepository");
$notes = $noteRepository->all();
echo json_encode($notes);
?>