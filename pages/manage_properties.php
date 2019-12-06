<?php

if ($_SESSION['username'] == null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to manage your properties.');
    die(header('Location: ./login.php'));
}

$username = $_SESSION['username'];

?>