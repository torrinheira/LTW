<?php

    include_once('../includes/session.php');
    include_once('./templates/tpl_common.php');

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <?php draw_header(); ?>
        <?php draw_search(); ?>        
        <?php draw_footer(); ?>
    </body>
</html>