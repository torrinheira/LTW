<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');

include_once('../database/db_property.php');
include_once('../database/db_reservation.php');
include_once('../database/db_user.php');


$username = $_SESSION['username'];

$property_id = $_POST['property_id'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guests = $_POST['guests'];

if ($username == null) {
    die(redirect_login('error', 'Please log in to confirm your reservation.'));
}

//we need to verify again if dates and number of guests are right, otherwise is not possible to conclude the reservation
if ($checkout <= $checkin) {
    die(redirect('error', 'Please verify your check in and check out dates.'));
}

if($guests <= 0){
    die(redirect('error','Number of guests invalid'));
}


$property_info = get_property_info($property_id);
if($property_info['owner'] == $username){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'You cannot reserve your own properties.');
    die(header('Location: ../index.php'));
}


$reservations = all_property_reservation($property_id);

$is_available = TRUE;
foreach ($reservations as $reservation) {

    if ($checkin >= $reservation['arrival_date'] && $checkin < $reservation['departure_date']) {
        $is_available = FALSE;
        break;
    } else if ($checkout > $reservation['arrival_date'] && $checkout <= $reservation['departure_date']) {
        $is_available = FALSE;
        break;
    } else if (($checkin <= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout >= $reservation['departure_date'])) {
        $is_available = FALSE;
        break;
    } else if (($checkin >= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout <= $reservation['departure_date'])) {
        $is_available = FALSE;
        break;
    }
}


if (($property_info['capacity'] >= $guests) && $is_available) {
    add_reservation($property_id, $username, $checkin, $checkout);
    die(redirect('error', 'Reservation made successfully.'));
} else {
    die(redirect('error', 'An error occurred while booking. Please check your data.'));
}

?>
