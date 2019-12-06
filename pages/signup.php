<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_auth.php');


    if (isset($_SESSION['username'])) {
        die(header('Location: ../index.php'));
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php draw_header(); ?>
        <?php draw_signup(); ?>
        <?php draw_footer(); ?>
    </body>
</html>