<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_reservation.php');
    include_once('../database/db_user.php');
    include_once('../database/db_reservation.php');
    include_once('../database/db_property.php');
    include_once('../debug/debug.php');

    if ($_SESSION['username'] == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to manage your reservations.');
        die(header('Location: ./login.php'));
    }

    $username = $_SESSION['username'];
    $user_id = getUserID($username);
    $reservations = get_user_reservations($user_id);
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">
    </head>

    <body>

        <?php draw_header(); ?>

        <ul>
        <?php
            foreach($reservations as $reservation){
                $property_of_reservation = $reservation['property_id'];
                $info = get_property_info($property_of_reservation);
                draw_manage_reservation($reservation, $info['title'], $info['city']);
            }
        ?>
        </ul>

        <?php draw_footer(); ?>

    </body>

</html>