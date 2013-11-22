<?php
include ("include/header.php");
include ("lib/func_image.php");

$gLv1 = $_POST['gLv1'];
$gLv2 = $_POST['gLv2'];
$gLv3 = $_POST['gLv3'];
$gLv4 = $_POST['gLv4'];
$gLv5 = $_POST['gLv5'];
$tag = $_POST['tags'];
//echo $tag;
// echo "glv1 > ".$gLv1."<br>";
// echo "glv2 > ".$gLv2."<br>";
// echo "glv3 > ".$gLv3."<br>";
// echo "glv4 > ".$gLv4."<br>";
// echo "glv5 > ".$gLv5."<br>";
// echo "tag > ".$tag."<br>";

//upload pdf
if(!(!file_exists($_FILES['pdfUpload']['tmp_name']) || !is_uploaded_file($_FILES['pdfUpload']['tmp_name']))){
		
		if ($_FILES["pdfUpload"]["error"] > 0) {
			//echo "Error: " . $_FILES["pdfUpload"]["error"] . "<br>";
		}
		else {
			// echo "Upload: " . $_FILES["pdfUpload"]["name"] . "<br>";
			// echo "Type: " . $_FILES["pdfUpload"]["type"] . "<br>";
			// echo "Size: " . ($_FILES["pdfUpload"]["size"] / 1024) . " kB<br>";
			// echo "Stored in: " . $_FILES["pdfUpload"]["tmp_name"]. "<br>";
		}

		$pdf_target_path = "../pdf/";
		$pdfFileName = basename($_FILES["pdfUpload"]['name']);
		$pdf_target_path = $pdf_target_path . $pdfFileName;
		echo "target_path >".$pdf_target_path. "<br>";	
		if (move_uploaded_file($_FILES["pdfUpload"]['tmp_name'], $pdf_target_path)) {
			//echo "The file " . basename($_FILES["pdfUpload"]['name']) . " has been uploaded". "<br />";
		} else {
			echo "There was an error uploading the file, please try again!". "<br />";
		}				
}

// upload image
if(!(!file_exists($_FILES['imageUpload']['tmp_name']) || !is_uploaded_file($_FILES['imageUpload']['tmp_name']))){
		
		if ($_FILES["imageUpload"]["error"] > 0) {
			echo "Error: " . $_FILES["imageUpload"]["error"] . "<br>";
		} else {
			// echo "Upload: " . $_FILES["imageUpload"]["name"] . "<br>";
			// echo "Type: " . $_FILES["imageUpload"]["type"] . "<br>";
			// echo "Size: " . ($_FILES["imageUpload"]["size"] / 1024) . " kB<br>";
			// echo "Stored in: " . $_FILES["imageUpload"]["tmp_name"] . "<br>";
		}
	
		$image_target_path = "../images/pdf_image/";
		$imageFileName = strtotime("now")."_".basename($_FILES["imageUpload"]['name']);
		$image_target_path = $image_target_path.$imageFileName;
		
	    // resize
		$images = $_FILES["imageUpload"]["tmp_name"];
        $new_images = "_".$_FILES["imageUpload"]["name"];
        $width=150; //*** Fix Width & Heigh (Autu caculate) ***//
        $height=150;
        $size=GetimageSize($images);
		if(($_FILES["imageUpload"]["type"] == "image/jpg") ||($_FILES["imageUpload"]["type"] == "image/jpeg")){
	        $images_orig = ImageCreateFromJPEG($images);
	        $photoX = ImagesX($images_orig);
	        $photoY = ImagesY($images_orig);
	        $images_fin = ImageCreateTrueColor($width, $height);
	        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	        ImageJPEG($images_fin,"../images/pdf_image/".$imageFileName);
	        ImageDestroy($images_orig);
	        ImageDestroy($images_fin);
		}
		if($_FILES["imageUpload"]["type"] == "image/png"){
	        $images_orig = ImageCreateFromPNG($images);
	        $photoX = ImagesX($images_orig);
	        $photoY = ImagesY($images_orig);
	        $images_fin = ImageCreateTrueColor($width, $height);
	        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	        ImagePNG($images_fin,"../images/pdf_image/".$imageFileName);
	        ImageDestroy($images_orig);
	        ImageDestroy($images_fin);
		}
		if($_FILES["imageUpload"]["type"] == "image/gif"){
	        $images_orig = ImageCreateFromGIF($images);
	        $photoX = ImagesX($images_orig);
	        $photoY = ImagesY($images_orig);
	        $images_fin = ImageCreateTrueColor($width, $height);
	        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	        ImageGIF($images_fin,"../images/pdf_image/".$imageFileName);
	        ImageDestroy($images_orig);
	        ImageDestroy($images_fin);
		}
		
        
		/*		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["imageUpload"]["name"]);
		$extension = end($temp);
		if ((($_FILES["imageUpload"]["type"] == "image/gif")
		|| ($_FILES["imageUpload"]["type"] == "image/jpeg")
		|| ($_FILES["imageUpload"]["type"] == "image/jpg")
		|| ($_FILES["imageUpload"]["type"] == "image/pjpeg")
		|| ($_FILES["imageUpload"]["type"] == "image/x-png")
		|| ($_FILES["imageUpload"]["type"] == "image/png"))
		&& in_array($extension, $allowedExts)){
			if ($_FILES["imageUpload"]["error"] > 0) {
				echo "Error: " . $_FILES["imageUpload"]["error"] . "<br />";
			} else {
				
				if (move_uploaded_file($_FILES["imageUpload"]['tmp_name'], $image_target_path)) {
					echo "The file " . $imageFileName . " has been uploaded". "<br />";
					
				} else {
					echo "There was an error uploading the file, please try again!". "<br />";
				}
			}
		} else {
			echo "Invalid file";
		}
		 * 
		 */
}else{
	$imageFileName = "no-image.png";
}
$current_time = date("Y-m-d H:i:s");
echo $sqlPdf = "
	INSERT INTO `PDF` (
		`NAME`, 
		`PHOTO_NAME`,
		`DESCRIPTION`,
		`PRICE`,
		`UPDATE_DATE`,
		`PATH`,
		`Is_Asian_country`
	)
	VALUES (
		'{$_POST["name"]}',
		'{$imageFileName}',
		'{$_POST["description"]}',
		'{$_POST["price"]}',
		 '{$current_time}',
		'{$pdfFileName}',
		'{$_POST["asian"]}'
	)
;";
//echo $sqlPdf;
$insertPdfResult = mysql_query($sqlPdf);
// echo mysql_insert_id(). "<br />";
// $result = @mysql_query($sql);
$PDF_ID = mysql_insert_id();

$string_tag = explode(',', $tag);
foreach($string_tag as $tag) {
	
    //echo $tag;
	echo $sqTag="
	INSERT INTO `TAG_RELATIONSHIP` (
		`PDF_ID`,
		`TAG_ID`
	)
	VALUE (
		'{$PDF_ID}',
		'{$tag}'
	)
;";
$insertTagResult = mysql_query($sqTag);
	// echo mysql_insert_id(). "<br />";
}


if ($gLv5 != 0 || $gLv5 !="") {
	$GROUP_LEVEL_ID = $gLv5;
	$GROUP_LEVEL_NAME = "5";
}
elseif($gLv4 != 0 || $gLv4 !="") {
	$GROUP_LEVEL_ID = $gLv4;
	$GROUP_LEVEL_NAME = "4";
}
elseif($gLv3 != 0 || $gLv3 !="") {
	$GROUP_LEVEL_ID = $gLv3;
	$GROUP_LEVEL_NAME = "3";
}
elseif($gLv2 != 0 || $gLv2 !="") {
	$GROUP_LEVEL_ID = $gLv2;
	$GROUP_LEVEL_NAME = "2";
	;
}
elseif($gLv1 != 0 || $gLv1 !="") {
	$GROUP_LEVEL_ID = $gLv1;
	$GROUP_LEVEL_NAME = "1";
}

echo $sqlCat="
	INSERT INTO `PDF_CATEGORY` (
		`PDF_ID`,
		`GROUP_LEVEL_NAME`,
		`GROUP_LEVEL_ID`
	)
	VALUE (
		'{$PDF_ID}',
		'{$GROUP_LEVEL_NAME}',
		'{$GROUP_LEVEL_ID}'
	);";

$insertCatResult = mysql_query($sqlCat);
$msg = "Sucess";
header("location: pdf.php?msg=$msg");
?>