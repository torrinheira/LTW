<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');

include_once('../database/db_property.php');
include_once('../database/db_property_image.php');

include_once('../templates/tpl_common.php');


$username = $_SESSION['username'];

if ($username == null) {
    die(redirect_login('error', 'Please log in to continue.'));
}

$property_id = $_GET['id'];

$info = get_property_info($property_id);
if ($username != $info['owner']) {
    die(redirect('error', 'you cannot edit other user property'));
}
$property_info = get_property_info($property_id);

$property_images = get_property_images($property_id);

$_SESSION['property_id'] = $property_id;

?> 

<!DOCTYPE html>
<html>

<head>
    <title>Place Genie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/edit_property.css" rel="stylesheet">

    <script src="../javascript/messages.js" type="module" defer></script>

</head>

<body>
    <?php draw_header(); ?>
    <section id="change_pictures">
        <div id="uploaded_images">
            <?php foreach ($property_images as $image) { ?>
            <div class="image_tile">
                <image src="../images/t_medium/<?=$image['image_id']?>.jpg" width="400" height="400">
                <a class="button" href="../actions/action_delete_property_image.php?image_id=<?=$image['image_id']?>">Delete</a>
            </div>
            <?php } ?>
        </div>
        <div id="upload_image">
            <form action="../actions/action_upload_property_image.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" required>
                <input type="text" name="description" placeholder="description">
                <input type="submit" value="Upload">
            </form>
        </div>
    </section>
    <section id="edit_property">
        <form action="../actions/action_edit_property.php" method="post">
            <input type="hidden" id="id_property" name="id_property" value="<?= $property_info['id'] ?>"> 
            <div class="form_entry p_title">Title<input type="text" name="new_title" value="<?= $property_info['title'] ?>" required></div>
            <div class="form_entry p_price">Price per night<input type="number" name="new_price" value="<?= $property_info['price'] ?>" min="0" required></div>
            <div class="form_entry p_city">City<input type="text" name="new_city" value="<?= $property_info['city'] ?>" required></div>
            <div class="form_entry p_address">Address<input type="text" name="new_address" value="<?= $property_info['address'] ?>" required></div>
            <div class="form_entry p_description">Description
                <textarea name="new_description" rows="5" cols="50" placeholder="Tell us a little bit about yourself..."><?php
                if ($property_info['description'] != null)
                    echo $property_info['description'];
                ?></textarea>
            </div>
            <div class="form_entry p_capacity">Capacity<input type="number" name="new_capacity" value="<?= $property_info['capacity'] ?>" min="1" max="20" required></div>
            <div class="input"><input type="submit" value="Update property"></div>
        </form>
    </section>
    <?php draw_footer(); ?>
</body>

</html>