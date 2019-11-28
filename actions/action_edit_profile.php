<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');

    include_once('../debug/debug.php');


    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to change your username');
        die(header('Location: ../pages/login.php'));
    }

    $new_username = $_POST['new_username'];
    // TODO: check if the username has any invalid characters
    // check if the username is available
    if (!availableUsername($new_username)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already taken...');
        die(header('Location: ../pages/edit_profile.php'));
    }

    console_log('got here');
    console_log($username);
    console_log($new_username);
    changeUsername($username, $new_username);
    console_log('changed username');
    $_SESSION['username'] = $new_username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Username changed successfuly!');
    header('Location: ../pages/edit_profile.php');