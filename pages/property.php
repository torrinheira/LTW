<?php

include_once('../includes/session.php');

include_once('../templates/tpl_common.php');
include_once('../templates/tpl_property.php');

include_once('../database/db_user.php');
include_once('../database/db_property.php');
include_once('../database/db_property_image.php');
include_once('../database/db_comment.php');

if(!isset($_GET['checkin']) || !isset($_GET['checkout']) || !isset($_GET['guests'])){
    $numberguest = 1;
    $checkin = date('Y-m-d');
    $checkout= date('Y-m-d', strtotime('tomorrow'));
}
else{
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $numberguest = $_GET['guests'];
}
$property_id = $_GET['id'];

$property = get_property_info($property_id);

$comments = get_comments($property_id);

$images = get_property_images($property_id);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Place Genie </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/slideshow.css" rel="stylesheet">
    <link href="../css/property.css" rel="stylesheet">
    
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <script src="../javascript/valid_date.js" defer></script>
    <script src="../javascript/messages.js" type="module" defer></script>
    <script src="../javascript/authentication.js" type="module" defer></script>
    <script src="../javascript/comments.js" type="module" defer></script>
    <script src="../javascript/slideshow.js" defer></script>

</head>

<body>
    <?php draw_header(); ?>
    <?php draw_property_info($property, $images); ?>
    <?php 
    if(isset($_SESSION['username'])){
        if ($property['owner'] != $_SESSION['username']){
            draw_reservation($checkin, $checkout, $numberguest, $property_id);
        } 
    }
    ?>
    <?php draw_comments(); ?>
</body>

</html>
