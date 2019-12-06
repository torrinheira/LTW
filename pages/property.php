<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_auth.php');    
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');
    include_once('../database/db_user.php');
    include_once('../database/db_property.php');

    $property_id = $_GET['id'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $numberguest = $_GET['guests'];
    $property = get_property_info($property_id);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php draw_header(); ?>
        <?php draw_property_info($property);?>
        <?php draw_reservation($checkin, $checkout, $numberguest, $property_id);?>
        <?php draw_footer(); ?>
    </body>
</html>


