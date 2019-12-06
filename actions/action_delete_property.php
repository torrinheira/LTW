<?php

    include_once('../includes/session.php');
    include_once('../debug/debug.php');
    include_once('../database/db_property.php');

    

    $username = $_SESSION['username'];

    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to continue.');
        die(header('Location: ../pages/login.php'));
    }

    $property_id = $_GET['id'];
    console_log($property_id);
    delete_property($property_id);

    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Property deleted.');
    //TODO: this must be change ( instead of index we must redirect to the profile page, altough it's not working)
    header('Location: ../index.php');

?>