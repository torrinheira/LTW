<?php

    include_once('../includes/session.php');

    include_once('../templates/tpl_auth.php');    
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');

    include_once('../database/db_user.php');
    include_once('../database/db_property.php');
    include_once('../database/db_comment.php');

    $property_id = $_GET['id'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $numberguest = $_GET['guests'];
    $property = get_property_info($property_id);
    $owner = get_username($property['owner_id']);

    $comments = get_comments($property_id);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie </title>
        <meta charset="utf-8">

        <script src="../javascript/comments.js" defer></script>
    </head>
    <body>
        <?php draw_header(); ?>
        <?php draw_property_info($property, $owner); ?>
        <?php draw_reservation($checkin, $checkout, $numberguest, $property_id); ?>
        <?php draw_comments(); ?>
        <?php draw_footer(); ?>
    </body>
</html>


