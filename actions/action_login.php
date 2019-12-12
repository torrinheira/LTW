<?php

include_once('../includes/session.php');
include_once('../database/db_user.php');
include_once('../includes/redirect.php');


$username = $_POST['username'];
$password = $_POST['password'];

// TODO: check if the user is already logged in
// TODO: check if the username and password have no invalid characters
if (validCredentials($username, $password)) {
    $_SESSION['username'] = $username;
    die(redirect_login('success', 'Logged in successfully!'));
} else {
    die(redirect_login('error', 'Invalid credentials! Login failed!'));
}

?>
