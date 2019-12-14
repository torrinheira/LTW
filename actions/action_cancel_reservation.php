<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/input_validation.php');

include_once('../database/db_user.php');
include_once('../database/db_reservation.php');
include_once('../database/db_property.php');



$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in to cancel your reservation.'));
}

$reservation_id = $_GET['id'];

$reservation_info = get_reservation_info($reservation_id);
$property = get_property_info($reservation_info['property_id']);


if (($username == $reservation_info['tourist']) || ($username == $property['owner'])){
    cancel_reservation($reservation_id);
    die(redirect('success', 'Reservation canceled!'));
}

die(redirect('error', 'You cannot delete other user reservation.'));
?>
