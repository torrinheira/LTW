<?php

include_once('../includes/database.php');



function get_comments($property_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT id, user_id, text FROM comment WHERE property_id = ?');
    $stmt->execute(array($property_id));

    return $stmt->fetchAll();
}


function insert_comment($user_id, $property_id, $text)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO comment(user_id, property_id, text) VALUES(?, ?, ?)');
    $stmt->execute(array($user_id, $property_id, $text));
}


function delete_comment($comment_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM comment WHERE id = ?');
    $stmt->execute(array($comment_id));
}


?>
