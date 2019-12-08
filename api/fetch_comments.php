<?php

include_once('../database/db_comment.php');
include_once('../database/db_user.php');
include_once('../database/db_property.php');


header('Content-Type: application/json');

// TODO: check if the property id is valid
$property_id = $_POST['id'];

$comments = get_comments($property_id);

echo json_encode($comments);

?>
