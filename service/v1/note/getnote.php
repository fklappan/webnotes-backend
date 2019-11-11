<?php
include ("../../../init.php");
$loginService = $container->make("loginService");
$loginService->attemptRestService();
$noteRepository = $container->make("noteRepository");
$note = $noteRepository->find($_GET["id"]);
header('Content-Type: application/json');
echo json_encode($note);
?>