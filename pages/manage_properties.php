<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    include_once('../database/db_property.php');
    include_once('../debug/debug.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');



    if ($_SESSION['username'] == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to manage your properties.');
        die(header('Location: ./login.php'));
    }

    $username = $_SESSION['username'];
    $user_id = getUserID($username);
    $user_properties = get_user_properties($user_id);
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">
    </head>

    <body>

        <?php draw_header(); ?>

        <ul>
        <?php
            foreach($user_properties as $user_property){
                draw_manage_property($user_property);
            }
        ?>
        </ul>

        <?php draw_footer(); ?>

    </body>

</html>