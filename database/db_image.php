<?php

include_once('../includes/database.php');
include_once('../debug/debug.php');


function insertImage($description)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO image(description) VALUES(?)');
    $stmt->execute(array($description));

    return $db->lastInsertId();
}


// returns true if the image with the provided id was deleted
function deleteImage($image_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM image WHERE id = ?');
    $stmt->execute(array($image_id));

    return $stmt->fetch() ? false : true;
}
