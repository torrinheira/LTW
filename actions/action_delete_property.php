<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/input_validation.php');

include_once('../database/db_property.php');


$username = $_SESSION['username'];

if ($username == null) {
    die(redirect_login('error', 'Please login to continue.'));
}


$property_id = $_GET['id'];
$info = get_property_info($property_id);

if ($info['owner'] != $username) {
    die(redirect('error', 'You cannot delete other user property'));
}
delete_property($property_id);

die(redirect('success', 'Property deleted!'));

?>