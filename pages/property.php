<?php

    include_once('../includes/session.php');

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
    $owner = $property['owner'];

    $comments = get_comments($property_id);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie </title>
        <meta charset="utf-8">

        <link href="../css/common.css" rel="stylesheet">

        <script src="../javascript/comments.js" type="module" defer></script>
        <script src="../javascript/authentication.js" type="module" defer></script>
        <script src="../javascript/valid_date.js" defer></script>
        <script src="../javascript/messages.js" type="module" defer></script>


    </head>
    <body>
        <?php draw_header(); ?>
        <?php draw_property_info($property, $owner); ?>
        <?php draw_reservation($checkin, $checkout, $numberguest, $property_id); ?>
        <?php draw_comments(); ?>
        <?php draw_footer(); ?>
    </body>
</html>


