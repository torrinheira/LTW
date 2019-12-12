<?php
include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../database/db_reservation.php');
include_once('../database/db_user.php');


$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in to cancel your reservation.'));
}

$reservation_id = $_GET['id'];

cancel_reservation($reservation_id);
die(redirect('success', 'Reservation canceled!'));

?>
