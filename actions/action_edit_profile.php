<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/input_validation.php');

include_once('../database/db_user.php');


$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in to edit your profile.'));
}


$new_username = $_POST['new_username'];

if (!check_input($new_username)) {
    die(redirect('error', 'New username: invalid characters'));
}

if ($username != $new_username && !availableUsername($new_username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already taken...');
    die(header('Location: ../pages/edit_profile.php'));
}

// validate the new first name
$new_first_name = $_POST['new_first_name'];
if (!check_input_names($new_first_name)) {
    die(redirect('error', 'New first name: invalid characters'));
}

// validate the new last name
$new_last_name = $_POST['new_last_name'];
if (!check_input_names($new_last_name)) {
    die(redirect('error', 'New last name: invalid characters'));
}

// validate the new email
$old_email = getEmail($username);
$new_email = $_POST['new_email'];
if (strcmp($old_email, $new_email) !== 0 && !availableEmail($new_email)) {
    die(redirect('error', 'Email already associated to another account.'));
}

// validate the new description
$new_description = $_POST['new_description'];

changeProfile($username, $new_username, $new_first_name, $new_last_name, $new_email, $new_description);
$_SESSION['username'] = $new_username;
die(redirect('success', 'Profile updated!'));

?>
