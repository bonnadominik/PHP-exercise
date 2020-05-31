<?php
    $image = imagecreatefromjpeg('image.jpg');
    
    
    $imageWidth = imagesx($image);
    $imageHeight = imagesy($image);

    $newImageWidth = $imageWidth;
    $newImageHeight = $imageHeight;

    while ($newImageWidth >= 600) {
        $newImageWidth = $newImageWidth / 2;
        $newImageHeight = $newImageHeight / 2;
    }
    
    $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);

    imagecopyresized($newImage,$image,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
    
    $text = "Dominik Bonna";
    $size=36;
    $font=realpath("Roboto-Medium.ttf");
    $color=imagecolorallocate($newImage,214,36,36);
    $xPosition = imagesx($newImage)/5;
    $yPosition = imagesy($newImage)-100;
    imagettftext($newImage,$size,0,$xPosition, $yPosition,  $color, $font, $text);
    header("Content-type: image/jpeg");
    imagejpeg($newImage);
    imagedestroy($newImage);
    imagedestroy($image);
?>