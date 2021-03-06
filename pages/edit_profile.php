<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');

include_once('../templates/tpl_common.php');

include_once('../database/db_user.php');


if ($_SESSION['username'] == null) {
    die(redirect_login('error', 'Please log in to edit your profile.'));
}

$profile_info = getUserInfo($_SESSION['username']);

?>


<!DOCTYPE html>
<html>

<head>
    <title>Place Genie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/edit_profile.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <script src="../javascript/messages.js" type="module" defer></script>
</head>

<body>

    <?php draw_header(); ?>

    <section id="change_picture">
        <h3>Profile picture</h3>

        <img class="responsive_image" src="../images/t_medium/<?=$profile_info['image']?>.jpg" width="400" height="400">

        <form action="../actions/action_change_profile_picture.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" required>
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
        <h3>Public profile</h3>
        <form action="../actions/action_edit_profile.php" method="post">
            <div class="form_entry username">Username<input type="text" name="new_username" placeholder="Username" value="<?= $profile_info['username'] ?>" required></div>
            <div class="form_entry first">First Name<input type="text" name="new_first_name" placeholder="John" value="<?= $profile_info['first_name'] ?>" required></div>
            <div class="form_entry last">Last Name<input type="text" name="new_last_name" placeholder="Doe" value="<?= $profile_info['last_name'] ?>" required></div>
            <div class="form_entry email">Email<input type="email" name="new_email" placeholder="johndoe@something.com" value="<?= $profile_info['email'] ?>" required></div>
            <div class="form_entry description">Description
                <textarea name="new_description" rows="5" cols="50" placeholder="Tell us a little bit about yourself..."><?php 
                if ($profile_info['description'] != null)
                    echo $profile_info['description'];
                ?></textarea>
            </div>
            <div class="form_entry submit"><input type="submit" value="Update profile"></div>
        </form>
    </section>

    <section id="change_password">
        <h3>Change password</h3>
        <form action="../actions/action_change_password.php" method="post">
            <div class="form_entry old_pass">Old password<input type="password" name="old_password" required></div>
            <div class="form_entry new_pass">New password<input type="password" name="new_password" required></div>
            <div class="form_entry new_pass_confirm">Confirm new password<input type="password" name="rep_password" required></div>
            <div class="form_entry submit"><input type="submit" value="Update password"></div>
        </form>
    </section>

</body>

</html>