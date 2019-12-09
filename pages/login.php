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
        <title>Place Genie | Login</title>
        <meta charset="utf-8">

        <link href="../css/common.css" rel="stylesheet">

    </head>
    <body>
        <?php draw_header(); ?>
        <?php draw_login(); ?>
        <?php draw_footer(); ?>
    </body>

</html>