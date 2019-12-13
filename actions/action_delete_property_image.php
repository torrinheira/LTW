<?php

include_once('../includes/session.php');
include_once('../includes/images.php');
include_once('../includes/redirect.php');

include_once('../database/db_property.php');
include_once('../database/db_property_image.php');


$username = $_SESSION['username'];
if ($username == null) {
    die(redirect_login('error', 'Please log in.'));
}

$image_id = $_GET['image_id'];

if (!isset($_SESSION['property_id'])) {
    die(redirect('error', 'Please try again.'));
}
$property_id = $_SESSION['property_id'];
unset($_SESSION['property_id']);

if (get_property($image_id) !== $property_id) {
    die(redirect('error', 'Please try again.'));
}

if (get_property_info($property_id)['owner'] !== $username) {
    die(redirect('error', 'Cannot remove pictures of another person\'s property.'));
}


removeImage($image_id);

die(redirect('success', 'Picture removed!'));

?>
