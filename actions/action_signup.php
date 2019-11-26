<?php
    
    include_once('../includes/session.php');
    include_once('../database/user.php');


    $username = $_POST['username'];
    $password = $_POST['password'];

    // check if the username has any invalid characters
    if (!preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
        die(header('Location: ../pages/signup.php'));
    }

    // check if the username is available
    if (!availableUsername($username)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already taken...');
        die(header('Location: ../pages/signup.php'));
    }

    // check if the password is valid
    /* TODO: check if the password characters are valid to prevent injection,
        also find out what the second part of the condition does */
    if (strlen($password) <= 5 || !(strcspn($password, '0123456789') + 1)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password must be at least 5 characters long and contain a number!');
        die(header('Location: ../pages/signup.php'));
    }


    try {
        insertUser($username, $password);
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
        header('Location: ../index.php');
    }
    catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to sign up!');
        header('Location: ../pages/signup.php');
    }

?>
