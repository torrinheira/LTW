<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');


    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to edit your profile');
        die(header('Location: ../pages/login.php'));
    }


    // validate the new username
    $new_username = $_POST['new_username'];
    // TODO: check if the username has any invalid characters
    // check if the username is available
    if ($username != $new_username && !availableUsername($new_username)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already taken...');
        die(header('Location: ../pages/edit_profile.php'));
    }

    // validate the new first name
    $new_first_name = $_POST['new_first_name'];
    // TODO: check for invalid characters

    // validate the new last name
    $new_last_name = $_POST['new_last_name'];
    // TODO: check for invalid characters

    // validate the new email
    $new_email = $_POST['new_email'];
    // TODO: check for invalid characters

    // validate the new description
    $new_description = $_POST['new_description'];
    // TODO: check for invalid characters

    changeProfile($username, $new_username, $new_first_name, $new_last_name, $new_email, $new_description);
    $_SESSION['username'] = $new_username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Profile info updated!');
    header('Location: ../pages/edit_profile.php');
