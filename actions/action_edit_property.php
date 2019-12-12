<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/input_validation.php');

include_once('../database/db_property.php');
include_once('../database/db_user.php');



$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in to edit your property'));
}

$property_id = $_POST['id_property'];

// validate the new first name
$new_title = $_POST['new_title'];
$new_price = $_POST['new_price'];
// validate the new city
$new_city = strtolower($_POST['new_city']);
// validate the new address
$new_address = $_POST['new_address'];
// validate the new description
$new_description = $_POST['new_description'];
$new_capacity = $_POST['new_capacity'];

if (!check_input($new_title)) {
    die(redirect('error', 'Title: invalid characters'));
}

if (!check_input($new_city)) {
    die(redirect('error', 'City: invalid characters'));
}

if (!check_input_address($new_address)) {
    die(redirect('error', 'Address: invalid characters'));
}

update_property($property_id, $new_title, $new_price, $new_city, $new_address, $new_description, $new_capacity);

die(redirect('success', 'Property updated!'));

?>
