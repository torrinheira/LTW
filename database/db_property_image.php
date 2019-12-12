<?php

include_once('../includes/database.php');


function get_property_images($property_id)
{ 
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT image_id FROM property_image WHERE property_id = ?');
    $stmt->execute(array($property_id));

    return $stmt->fetchAll();
}

function insert_property_image($image_id, $property_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO property_image(image_id, property_id) VALUES(?, ?)');
    $stmt->execute(array($image_id, $property_id));
}

?>
