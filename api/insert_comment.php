<?php

include_once('../includes/session.php');

include_once('../database/db_comment.php');
include_once('../database/db_user.php');
include_once('../database/db_property.php');


if (!isset($_SESSION['username'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to leave a comment');
    die(header('Location: ../pages/login.php'));
}

// TODO: check if all these are valid
$user_id = get_user_id($_SESSION['username']);
$property_id = $_POST['property_id'];
$content = $_POST['content'];

insert_comment($user_id, $property_id, $content, date('Y-m-d'));

?>