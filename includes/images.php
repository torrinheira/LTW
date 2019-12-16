<?php

    include_once('../database/db_image.php');
    include_once('../inludes/images.php');


    function checkExtension($image) {
        $ext = pathinfo($image, PATHINFO_EXTENSION);

        if ($ext != 'jpg' && $ext != 'jpeg')
            redirect('error', $ext);
    }


    function uploadImage($image, $description) {

        // create an id for the new image
        $id = insertImage($description);

        // generate file names for the original, medium and small images
        $originalFileName = "../images/originals/$id.jpg";
        $mediumFileName = "../images/t_medium/$id.jpg";
        $smallFileName = "../images/t_small/$id.jpg";

        // move the uploaded file to its final destination
        move_uploaded_file($image, $originalFileName);
        
        // create an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);

        $width = imagesx($original);        // width of the original image
        $height = imagesy($original);       // height of the original image
        $square = min($width, $height);     // size length of the original square


        // create and save a small square thumbnail
        $small = imagecreatetruecolor(200, 200);
        imagecopyresized($small, $original, 0, 0, ($width > $square) ? ($width - $square) / 2 : 0, ($height > $square) ? ($height - $square) / 2 : 0, 200, 200, $square, $square);
        imagejpeg($small, $smallFileName);


        // calculate width and height of medium sized image (max width: 400)
        $mediumWidth = $width;
        $mediumHeight = $height;
        if ($mediumWidth > 400) {
            $mediumWidth = 400;
            $mediumHeight = $mediumHeight * ($mediumWidth / $width);
        }

        // create and save medium image
        $medium = imagecreatetruecolor($mediumWidth, $mediumHeight);
        imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumWidth, $mediumHeight, $width, $height);
        imagejpeg($medium, $mediumFileName);

        return $id;
    }


    function removeImage($image_id) {

        if (!deleteImage($image_id)) {
            return;
        }

        unlink(realpath("../images/originals/" . $image_id . ".jpg"));
        unlink(realpath("../images/t_medium/" . $image_id. ".jpg"));
        unlink(realpath("../images/t_small/" . $image_id . ".jpg"));
    }

?>
