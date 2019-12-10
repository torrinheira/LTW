<?php

include_once('../includes/session.php');
include_once('../database/db_comment.php');


if (!isset($_SESSION['username'])) {
    die;
}

// TODO: validate the id
$comment_id = $_POST['comment_id'];

// TODO: get the comment username and check if the user is logged in
    if (get_user($comment_id) != $_SESSION['username']) {
    die;
}

delete_comment($comment_id);

?>
