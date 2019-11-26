<?php
    
    include_once('../database/user.php');
    include_once('../database/session.php');


    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: check if the user is already logged in
    if (validCredentials($username, $password)){
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
        header('Location: ../index.php');
    }
    else {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid credentials! Login failed!');
        header('Location: ../pages/login.php');
    }

?>
