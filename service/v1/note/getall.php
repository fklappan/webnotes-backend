<?php
header("Access-Control-Allow-Origin: *");
include ("../../../init.php");
$loginService = $container->make("loginService");
$loginService->attemptRestService();
$noteRepository = $container->make("noteRepository");
$notes = $noteRepository->all();
echo json_encode($notes);
?>