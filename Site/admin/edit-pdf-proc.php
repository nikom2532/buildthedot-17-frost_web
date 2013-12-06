<?php 
include ("include/header.php");
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
$PDF_ID = $_POST['pdfId'];
$tag = $_POST['tag'];
$mySingleField = $_POST['mySingleField'];


$tag = $_POST['tags'];
echo "tag = ".$tag."<br />";

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
        $height=150;//#
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
$sqlPdf = "
	UPDATE `PDF` 
	SET 
		`NAME` =  '{$_POST["name"]}' ,
		`PHOTO_NAME` = '{$imageFileName}' ,
		`DESCRIPTION` = '{$_POST["description"]}' ,
		`PRICE` = '{$_POST["price"]}' ,
		`UPDATE_DATE` = '{$current_time}' ,
		`PATH` = '{$pdfFileName}' ,
		`Is_Asian_country` = '{$_POST["asian"]}'
	WHERE `ID` = '{$PDF_ID}'
;";
$insertPdfResult = @mysql_query($sqlPdf);
##$result = @mysql_query($sql);

$string_tag = explode(',', $tag);
foreach($string_tag as $tag) {
	echo $sqTag="
		INSERT INTO `TAG_RELATIONSHIP`
		(`PDF_ID`, `TAG_ID`)
		VALUES
		('{$PDF_ID}', '{$tag}')
	;";
	$insertTagResult = @mysql_query($sqTag);
}

$msg = "Success";

//header("location: pdf.php?msg=$msg");
	
//$strSQL="UPDATE tag SET NAME='$tagName' WHERE ID='$tagId'";
//$cmdQuery=mysql_query($strSQL);

// if(mysql_affected_rows()){
	//header("location: tag.php");
// }else{
	//"<sript>alert('The process failed')</script>";
// }
?>
<script>
<!--
//window.location = "pdf.php?msg=<?php echo $msg; ?>"
//-->
</script>