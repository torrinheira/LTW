<?php
    
    include_once('../includes/session.php');


    session_destroy();
    session_start();

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged out!');


    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        header('Location: ../index.php');
    }

?>