<?php
    
    include_once('../includes/session.php');
    include_once('../includes/input_validation.php');
    include_once('../database/db_user.php');
    include_once('../includes/redirect.php');


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

    if(!availableEmail($email)){
        $_SESSION['draw'] = 'signup';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email already associated with other account...');
        die(header('Location: ../index.php'));
    }

    if(!check_input_names($first_name)){
        die(redirect('error', 'First name: invalid characters'));
    }

    if(!check_input_names($last_name)){
        die(redirect('error', 'Last name: invalid characters'));
    }

    // check if the password is valid
    if (!check_password($password)) {
        $_SESSION['draw'] = 'signup';
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password invalid( at least 5 characters, minimum 1 letter and 1 number, limited special chars)');
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
