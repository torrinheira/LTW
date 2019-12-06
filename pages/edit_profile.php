<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../database/db_user.php');


    if ($_SESSION['username'] == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to edit your profile');
        die(header('Location: ./login.php'));
    }

    $profile_info = getUserInfo($_SESSION['username']);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="utf-8"></meta>
    </head>
    <body> 

        <?php draw_header(); ?>

        <section id="change_picture">
            <header>Profile picture</header>
            
            <img src="../images/t_medium/<?=$profile_info['image']?>.jpg" width="400" height="400">

            <form action="../actions/action_change_profile_picture.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image">
                <input type="submit" value="Upload">
            </form>
            
            <?php // if the id is different from the default profile picture id
            if ($profile_info['image'] != 1) { ?>
                <form action="../actions/action_remove_profile_picture.php" method="post">
                    <input type="submit" value="Remove photo">
                </form>
            <?php } ?>
        </section>

        <section id="edit_profile">
            <header>Public profile</header>
            <form action="../actions/action_edit_profile.php" method="post">
                <label>Username<input type="text" name="new_username" placeholder="Username" value="<?=$profile_info['username']?>" required></label>
                <label>First Name<input type="text" name="new_first_name" placeholder="John" value="<?=$profile_info['first_name']?>" required></label>
                <label>Last Name<input type="text" name="new_last_name" placeholder="Doe" value="<?=$profile_info['last_name']?>" required></label>
                <label>Email<input type="email" name="new_email" placeholder="johndoe@something.com" value="<?=$profile_info['email']?>" required></label>
                <label>Description
                    <textarea name="new_description" rows="5" cols="50" placeholder="Tell us a little bit about yourself..."><?php 
                    if ($profile_info['description'] != null)
                        echo $profile_info['description'];
                    ?></textarea>
                </label>
                <input type="submit" value="Update profile">
            </form>
        </section>

        <section id="change_password">
            <header>Change password</header>
            <form action="../actions/action_change_password.php" method="post">
                <label>Old password<input type="password" name="old_password" required></label>
                <label>New password<input type="password" name="new_password" required></label>
                <label>Confirm new password<input type="password" name="rep_password" required></label>
                <input type="submit" value="Update password">
            </form>
        </section>

        <?php draw_footer(); ?>

    </body>
</html>
    