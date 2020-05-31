<?php
    function resizePicture($image){
    
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);
    
        $newImageWidth = $imageWidth;
        $newImageHeight = $imageHeight;
    
        while ($newImageWidth >= 600) {
            $newImageWidth = $newImageWidth / 2;
            $newImageHeight = $newImageHeight / 2;
        }
        
        $newImageHandle = imagecreatetruecolor($newImageWidth, $newImageHeight);
    
        imagecopyresized($newImageHandle,$image,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
        
        header("Content-type: image/jpeg");
        imagejpeg($newImageHandle);
        imagedestroy($newImageHandle);
        imagedestroy($image);
    }
?>