<?php

include_once('../includes/database.php');



function get_comments($property_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT username, content, date FROM comment JOIN user WHERE property_id = ? and user_id = user.id');
    $stmt->execute(array($property_id));

    return $stmt->fetchAll();
}


function insert_comment($user_id, $property_id, $content, $date)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO comment(user_id, property_id, content, date) VALUES(?, ?, ?, ?)');
    $stmt->execute(array($user_id, $property_id, $content, $date));
}


function delete_comment($comment_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM comment WHERE id = ?');
    $stmt->execute(array($comment_id));
}


?>
