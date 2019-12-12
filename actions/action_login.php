<?php
    
    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    include_once('../includes/redirect.php');
    include_once('../includes/input_validation.php');


    if(isset($_SESSION['username'])){
        die(redirect('error','User already logged in!'));
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    if(!check_input($username)){
        die(redirect('error','Username: Invalid characters!'));
    }

    if(!check_password($password)){
        die(redirect('error','Password: Invalid characters!'));
    }
    if (validCredentials($username, $password)) {
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    }
    else {
        $_SESSION['draw'] = 'login';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid credentials! Login failed!');
        header('Location: ../index.php');
    }

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        header('Location: ../index.php');
    }

?>
