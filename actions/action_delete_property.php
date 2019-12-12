<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../database/db_property.php');


$username = $_SESSION['username'];

if ($username == null) {
    die(redirect_login('error', 'Please login to continue.'));
}

// TODO: check if the user that is logged in is the owner of the property,
// if not set error message and die

// TODO: check if the id is a number (if it is valid)
$property_id = $_GET['id'];
delete_property($property_id);

die(redirect('success', 'Property deleted!'));

?>
