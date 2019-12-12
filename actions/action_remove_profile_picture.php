<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/images.php');
include_once('../database/db_user.php');


$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in.'));
}

$current_picture = getProfilePicture($username);

if ($current_picture == DEFAULT_PIC) {
    die(redirect('error', 'Default picture cannot be deleted'));
}

setProfilePicture($username, DEFAULT_PIC);
removeImage($current_picture);

die(redirect('success', 'Picture removed!'));

?>
