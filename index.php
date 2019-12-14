<?php

    include_once('./includes/session.php');
    include_once('./templates/tpl_common.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">

        <link href="./css/constants.css" rel="stylesheet">
        <link href="./css/common.css" rel="stylesheet">
        <link href="./css/index.css" rel="stylesheet">


        <script src="./javascript/valid_date.js" defer></script>
        
        <script src="./javascript/authentication.js" type="module" defer></script>

        <script src="./javascript/messages.js" type="module" defer></script>

    </head>
    <body>
        <?php draw_header(); ?>
        <?php draw_search(); ?>
        <?php draw_footer(); ?>

    </body>
</html>
