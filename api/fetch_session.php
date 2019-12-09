<?php

include_once('../includes/session.php');

header('Content-Type: application/json');

json_encode($_SESSION['username']);

?>
