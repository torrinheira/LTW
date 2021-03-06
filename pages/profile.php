<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_profile.php');
    include_once('../database/db_user.php');
    include_once('../debug/debug.php');
    include_once('../includes/input_validation.php');
    include_once('../includes/redirect.php');

    

    $username = $_GET['username'];
    if(!check_input($username)){
        die(redirect('error', 'Username: invalid characters'));
    }

    $profile_info = getUserInfo($username);

    if ($profile_info == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Could not find user with username: ' . $username);
        die(header('Location: ../index.php'));
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">

        <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

        <script src="../javascript/authentication.js" type="module" defer></script>
        <script src="../javascript/messages.js" type="module" defer></script>

    </head>
    <body>

        <?php draw_header(); ?>
        <?php draw_profile($profile_info); ?>

    </body>
</html>