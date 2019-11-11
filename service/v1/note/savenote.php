<?php
include ("../../../init.php");
$loginService = $container->make("loginService");
$loginService->attemptRestService();
$noteRepository = $container->make("noteRepository");
$result = $noteRepository->saveNote();
header('Content-Type:application/json;charset=utf-8');
echo json_encode($result);
?>