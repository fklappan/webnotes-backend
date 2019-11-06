<?php
include ("../../../init.php");
$noteRepository = $container->make("noteRepository");
$result = $noteRepository->saveNote();
header('Content-Type:application/json;charset=utf-8');
echo json_encode($result);
?>