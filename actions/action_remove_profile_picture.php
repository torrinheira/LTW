<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    include_once('../includes/images.php');


    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to remove your profile picture');
        die(header('Location: ../pages/login.php'));
    }

    $current_picture = getProfilePicture($username);

    if ($current_picture == DEFAULT_PIC) {
        die(header('Location: ../pages/profile.php?username=' . $username));
    }

    setProfilePicture($username, DEFAULT_PIC);
    removeImage($current_picture);

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Picture removed successfuly!');
    header('Location: ../pages/profile.php?username=' . $username);
?>