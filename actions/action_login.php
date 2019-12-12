<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/input_validation.php');

include_once('../database/db_user.php');


if (isset($_SESSION['username'])) {
    die(redirect('error', 'User already logged in!'));
}

$username = $_POST['username'];
$password = $_POST['password'];

if (!check_input($username)) {
    die(redirect('error', 'Username: Invalid characters!'));
}

if (!check_password($password)) {
    die(redirect('error', 'Password: Invalid characters!'));
}

if (validCredentials($username, $password)) {
    $_SESSION['username'] = $username;
    die(redirect_login('success', 'Logged in successfully!'));
} else {
    die(redirect_login('error', 'Invalid credentials! Login failed!'));
}

?>
