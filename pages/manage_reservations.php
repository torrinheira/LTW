<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');

include_once('../templates/tpl_common.php');
include_once('../templates/tpl_property.php');
include_once('../templates/tpl_reservation.php');

include_once('../database/db_user.php');
include_once('../database/db_property.php');
include_once('../database/db_reservation.php');


if ($_SESSION['username'] == null) {
    die(redirect_login('error', 'Please log in to manage your reservations.'));
}

$username = $_SESSION['username'];
$upcoming_reservations = reservations_of_user_upcoming($username);
$current_reservation = current_user_reservation($username);
$previous_reservations = reservations_of_user_previous($username);


$number_previous = count($previous_reservations);
$number_upcoming = count($upcoming_reservations);
$number_current = count($current_reservation);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Place Genie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/reservations.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <script src="../javascript/messages.js" type="module" defer></script>

</head>

<body>
    <?php draw_header(); ?>
    
    <section id="current_reservation">
        <header>Current Reservation</header>
        <ul>
            <?php if ($number_current > 0) {
                foreach ($current_reservation as $reservation) {
                    $property_info = get_property_info($reservation['property_id']);
                    draw_user_current_previous($reservation, $property_info['title'], $property_info['city'], $property_info['owner']);
                }
            } else {
                draw_no_reservations();
            }
            ?>
        </ul>
    </section>

    <section id="upcoming_reservations">
        <header>Upcoming Reservations</header>
        <ul>
            <?php if ($number_upcoming > 0) {


                foreach ($upcoming_reservations as $upcoming_reservation) {
                    $property_info = get_property_info($upcoming_reservation['property_id']);
                    draw_user_upcoming($upcoming_reservation, $property_info['title'], $property_info['city'], $property_info['owner']);
                }
            } else {
                draw_no_reservations();
            } ?>
        </ul>
    </section>

    <section id="previous_reservations">
        <header>Previous Reservations</header>

        <ul>
            <?php if ($number_previous > 0) {
                foreach ($previous_reservations as $previous_reservation) {
                    $property_info = get_property_info($previous_reservation['property_id']);
                    draw_user_current_previous($previous_reservation, $property_info['title'], $property_info['city'], $property_info['owner']);
                }
            } else {
                draw_no_reservations();
            }
            ?>

        </ul>
    </section>


    <?php draw_footer(); ?>

</body>

</html>