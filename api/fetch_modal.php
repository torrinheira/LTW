<?php

include_once('../includes/session.php');

header('Content-Type: application/json');

if (!isset($_SESSION['draw']))
    $draw = null;
else
    $draw = $_SESSION['draw'];
    
unset($_SESSION['draw']);

echo json_encode($draw);

?>
