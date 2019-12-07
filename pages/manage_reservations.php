<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../database/db_user.php');
    include_once('../debug/debug.php');

    if ($_SESSION['username'] == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to manage your reservations.');
        die(header('Location: ./login.php'));
    }

    $username = $_SESSION['username'];

?>