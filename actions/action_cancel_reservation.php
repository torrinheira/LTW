<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/input_validation.php');

include_once('../database/db_user.php');
include_once('../database/db_reservation.php');


$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in to cancel your reservation.'));
}

$reservation_id = $_GET['id'];

$reservation_id = $_GET['id'];
$resevation_info = get_reservation_info($reservation_id);

if ($username != $resevation_info['tourist']){
    die(redirect('error', 'You cannot delete other user reservation.'));
}

cancel_reservation($reservation_id);
die(redirect('success', 'Reservation canceled!'));

?>
