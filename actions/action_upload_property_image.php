<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../includes/images.php');

include_once('../database/db_property_image.php');


if (!isset($_SESSION['property_id'])) {
    die(redirect('error', 'Please try again.'));
}

$property_id = $_SESSION['property_id'];
unset($_SESSION['property_id']);

$image_file = $_FILES['image']['tmp_name'];
checkExtension($image_file);
$image_description = $_POST['description'];


$image_id = uploadImage($image_file, $image_description);
insert_property_image($image_id, $property_id);

redirect('success', 'Added image.');

?>
