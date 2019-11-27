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
        <meta charset="UTF-8"></meta>
    </head>
    <body> 

        <?php draw_header(); ?>

        <section id="edit_profile">
            <header>Public profile</header>
            <form action="../actions/action_edit_profile.php" method="post">
                <input type="text" name="username" placeholder="Username" value="<?=$profile_info['username']?>" required>
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
    