<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    include_once('../includes/images.php');


    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to change your profile picture');
        die(header('Location: ../pages/login.php'));
    }

    $image_file = $_FILES['image']['tmp_name'];
    $image_description = $username . "'s profile picture";

    $image_id = uploadImage($image_file, $image_description);
    $old_image_id = getProfilePicture($username);

    if ($old_image_id != DEFAULT_PIC) {
        removeImage($old_image_id);
    }

    setProfilePicture($username, $image_id);

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Picture changed successfuly!');
    header('Location: ../pages/profile.php?username=' . $username);
?>
