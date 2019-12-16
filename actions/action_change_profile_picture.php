<?php

    include_once('../includes/session.php');
    include_once('../includes/redirect.php');
    include_once('../includes/images.php');
    include_once('../database/db_user.php');


    $username = $_SESSION['username'];
    if ($username == null) {
        die(redirect_login('error', 'Please log in to change your profile picture'));
    }

    $image_file = $_FILES['image']['tmp_name'];
    checkExtension($_FILES['image']['name']);
    $image_description = $username . "'s profile picture";

    $image_id = uploadImage($image_file, $image_description);
    $old_image_id = getProfilePicture($username);
    
    setProfilePicture($username, $image_id);

    if ($old_image_id != DEFAULT_PIC) {
        removeImage($old_image_id);
    }

    die(redirect('success', 'Picture changed successfuly!'));
    
?>
