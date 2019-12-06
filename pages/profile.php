<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../database/db_user.php');
    
    include_once('../debug/debug.php');


    $username = $_GET['username'];
    // TODO: check if the username has invalid characters

    $profile_info = getUserInfo($username);

    if ($profile_info == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Could not find user with username: ' . $username);
        // TODO: change this page
        die(header('Location: ../profile.php'));
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">
    </head>
    <body>

        <?php draw_header(); ?>

        <section id="profile">
            
            <img src="../images/t_medium/<?=$profile_info['image']?>.jpg" width="400" height="400">

            <p><?=$profile_info['username']?></p>
            <p><?=$profile_info['first_name'] . ' ' . $profile_info['last_name']?></p>
            <p><?=$profile_info['email']?></p>
            
            <?php if ($profile_info['description'] != null) { ?>
                <p><?=$profile_info['description']?></p>
            <?php } ?>
            
        </section>
        
        <?php if ($username == $_SESSION['username']) { ?>
            <a href="./edit_profile.php">Edit profile</a>
        <?php } ?>

        <?php if ($username == $_SESSION['username']) { ?>
        <p><a href="./add_property.php">Add Property</a></p>
        <?php } ?>

        <?php draw_footer(); ?>

    </body>
</html>