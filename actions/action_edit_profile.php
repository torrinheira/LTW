<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../database/db_user.php');


$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in to edit your profile.'));
}

$old_email = getEmail($username);
// validate the new username
$new_username = $_POST['new_username'];
// TODO: check if the username has any invalid characters
// check if the username is available
if ($username != $new_username && !availableUsername($new_username)) {
    die(redirect('error', 'Username already taken.'));
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
if ($old_email != $new_email && !availableEmail($new_email)) {
    die(redirect('error', 'Email already associated to another account.'));
}

// validate the new description
$new_description = $_POST['new_description'];
// TODO: check for invalid characters

changeProfile($username, $new_username, $new_first_name, $new_last_name, $new_email, $new_description);
$_SESSION['username'] = $new_username;
die(redirect('success', 'Profile updated!'));

?>
