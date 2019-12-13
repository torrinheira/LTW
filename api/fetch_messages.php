<?php

include_once('../includes/session.php');

header('Content-Type: application/json');

if (isset($_SESSION['messages']))
    $messages = $_SESSION['messages'];
else
    $messages = null;
unset($_SESSION['messages']);
echo json_encode($messages);

?>
