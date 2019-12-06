<?php
    include_once('../includes/session.php');
    include_once('../database/db_property.php');

    $username = $_SESSION['username'];

    //TODO: read readme @github
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to confirm your reservation.');
        die(header('Location: ../pages/login.php'));
    }

    
?>