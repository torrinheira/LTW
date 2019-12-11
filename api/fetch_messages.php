<?php

include_once('../includes/session.php');

header('Content-Type: application/json');

$messages = $_SESSION['messages'];
unset($_SESSION['messages']);
echo json_encode($messages);

?>
