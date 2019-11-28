<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');


    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to change your password');
        die(header('Location: ../pages/login.php'));
    }

    
    // TODO: check if the password has any invalid characters
    $old_password = $_POST['old_password'];
    // check if the password is correct
    if (!validCredentials($username, $old_password)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid password');
        die(header('Location: ../pages/edit_profile.php'));
    }


    // TODO: check if the passwords have any invalid characters
    $new_password = $_POST['new_password'];
    $rep_password = $_POST['rep_password'];
    // check if the old password and the confirmation one are equal
    if ($new_password != $rep_password) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'New passwords don\'t match');
        die(header('Location: ../pages/edit_profile.php'));
    }

    
    changePassword($username, $new_password);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Password changed successfuly!');
    header('Location: ../pages/edit_profile.php');

?>
