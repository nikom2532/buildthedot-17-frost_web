<?php
$images = "../images/pdf_image/1383237470_1358852121-skirtpenci-o.jpg";
        $new_images = "thumbnails_"."skirtpenci-o.jpg";
        copy($_FILES,"../images/pdf_image/1383237470_1358852121-skirtpenci-o.jpg");
        $width=200; //*** Fix Width & Heigh (Autu caculate) ***//
        $size=GetimageSize($images);
        $height=200;
        $images_orig = ImageCreateFromJPEG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
        ImageJPEG($images_fin,"../images/pdf_image/".$new_images);
        ImageDestroy($images_orig);
        ImageDestroy($images_fin);
?>