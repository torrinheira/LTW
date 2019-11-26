<?php

    include_once('./templates/tpl_common.php');
    include_once('./debug/debug.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">

        <script src="/javascript/valid-date.js" async></script>
    </head>
    <body>

        <?php draw_header(); ?>

        <?php draw_search(); ?>

        <?php draw_footer(); ?>

    </body>
</html>
