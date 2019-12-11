<?php
    
    include_once('../includes/session.php');
    include_once('../includes/input_validation.php');
    include_once('../database/db_user.php');


    // TODO: check if any of these variables have invalid characters
    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    if($password != $repeat_password){
        $_SESSION['draw'] = 'signup';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Passwords do not match!');
        die(header('Location: ../index.php'));
    }


    // check if the username has any invalid characters
    if (!check_input($username)) {
        $_SESSION['draw'] = 'signup';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
        die(header('Location: ../index.php'));
    }

    // check if the username is available
    if (!availableUsername($username)) {
        $_SESSION['draw'] = 'signup';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already taken...');
        die(header('Location: ../index.php'));
    }

    // check if the password is valid
    /* TODO: check if the password characters are valid to prevent injection,
        also find out what the second part of the condition does */
    if (!check_password($password)) {
        $_SESSION['draw'] = 'signup';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password must be at least 5 characters long and contain a number!');
        die(header('Location: ../index.php'));
    }


    try {
        insertUser($username, $email, $password, $first_name, $last_name);
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
        header('Location: ../index.php');
    }
    catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['draw'] = 'signup';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to sign up!');
        die(header('Location: ../index.php'));
    }

?>
