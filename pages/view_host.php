<?php

    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');
    include_once('../templates/tpl_profile.php');
    include_once('../database/db_user.php');
    include_once('../database/db_property.php');

    $property_id = $_GET['id'];
    $property_info = get_property_info($property_id);
    $host_id = $property_info['owner_id'];
    $host_username = get_username($host_id);
    $host_info = getUserInfo($host_username);
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">
    </head>

    <body>

        <?php draw_header(); ?>
        <?php draw_host_info($host_info); ?>
        <?php draw_footer(); ?>

    </body>

</html>