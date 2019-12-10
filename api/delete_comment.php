<?php

include_once('../includes/session.php');
include_once('../database/db_comment.php');

// TODO: validate the id
$comment_id = $_POST['id'];

delete_comment($comment_id);

?>
