<?php

    include_once('./includes/session.php');
    include_once('./templates/tpl_common.php');
    include_once('./debug/debug.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">

        <link href="./css/constants.css" rel="stylesheet">
        <link href="./css/common.css" rel="stylesheet">

        <script src="./javascript/valid_date.js" defer></script>
    </head>
    <body>

        <?php draw_header(); ?>
        <?php draw_search(); ?>
        <?php draw_footer(); ?>

    </body>
</html>
