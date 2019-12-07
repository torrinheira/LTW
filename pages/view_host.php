<?php

    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');
    include_once('../database/db_user.php');
    include_once('../database/db_property.php');

    $property_id = $_GET['id'];
    $property_info = get_property_info($property_id);
    $host_id = $property_info['owner_id'];
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">
    </head>

    <body>

        <?php draw_header(); ?>

        <!-- fazer display da informação toda do user-->
        <?php print_r($host_id); ?>

        <?php draw_footer(); ?>

    </body>

</html>