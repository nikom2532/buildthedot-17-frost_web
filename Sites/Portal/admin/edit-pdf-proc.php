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
//echo "tag = ".$tag."<br />";

//upload pdf
if(!(!file_exists($_FILES['pdfUpload']['tmp_name']) || !is_uploaded_file($_FILES['pdfUpload']['tmp_name']))){
	$pdf_target_path = "../pdf/";
	$pdfFileName = strtotime("now")."_".basename($_FILES["pdfUpload"]['name']);
	$pdf_target_path = $pdf_target_path . $pdfFileName;
	echo "target_path >".$pdf_target_path. "<br>";
	if (move_uploaded_file($_FILES["pdfUpload"]['tmp_name'], $pdf_target_path)) {
		//echo "The file " . basename($_FILES["pdfUpload"]['name']) . " has been uploaded". "<br />";
		$SQLFindPath="
			SELECT * FROM PDF WHERE ID={$pdfId};
		";
		$result_FindPath=@mysql_query($SQLFindPath);
		while ($rsFindPath=@mysql_fetch_array($result_FindPath)) {
			unlink($rootpath."pdf/".$rsFindPath["PATH"]);
		}
		$sqlPdf = "
			UPDATE `PDF` 
			SET 
				`PATH` = '{$pdfFileName}' ,
			WHERE `ID` = '{$PDF_ID}'
		;";
		$insertPdfResult = @mysql_query($sqlPdf);
	}
	else {
		echo "There was an error uploading the file, please try again!". "<br />";
	}
}

// upload image
if(!(!file_exists($_FILES['imageUpload']['tmp_name']) || !is_uploaded_file($_FILES['imageUpload']['tmp_name']))){
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
	$SQLFindPath="
		SELECT * FROM PDF WHERE ID={$pdfId};
	";
	$result_FindPath=@mysql_query($SQLFindPath);
	while ($rsFindPath=@mysql_fetch_array($result_FindPath)) {
		unlink($rootpath."images/pdf_image/".$rsFindPath["PHOTO_NAME"]);
	}
	$sqlPdf = "
		UPDATE `PDF` 
		SET 
			`PHOTO_NAME` = '{$imageFileName}' ,
		WHERE `ID` = '{$PDF_ID}'
	;";
	$insertPdfResult = @mysql_query($sqlPdf);
}
else{
	$imageFileName = "no-image.png";
}

$current_time = date("Y-m-d H:i:s");
$sqlPdf = "
	UPDATE `PDF` 
	SET 
		`NAME` =  '{$_POST["name"]}' ,
		`DESCRIPTION` = '{$_POST["description"]}' ,
		`PRICE` = '{$_POST["price"]}' ,
		`UPDATE_DATE` = '{$current_time}' ,
		`Is_Asian_country` = '{$_POST["asian"]}'
	WHERE `ID` = '{$PDF_ID}'
;";
$insertPdfResult = @mysql_query($sqlPdf);
##$result = @mysql_query($sql);

$string_tag = explode(',', $tag);
foreach($string_tag as $tag) {
	$sql_find_tag="
		SELECT `ID`
		FROM `TAG`
		WHERE `NAME` = '{$tag}' 
	;";
	$result_find_tag=@mysql_query($sql_find_tag);
	if($rs_find_tag = @mysql_fetch_array($result_find_tag)) {
		$sqTag="
			INSERT INTO `TAG_RELATIONSHIP`
			(`PDF_ID`, `TAG_ID`)
			VALUES
			('{$PDF_ID}', '".$rs_find_tag["ID"]."')
		;";
		$insertTagResult = @mysql_query($sqTag);
	}
	else{
		$sql_find_tag="
			INSERT INTO `TAG`
			(`NAME`)
			VALUE
			('{$tag}')
		;";
		@mysql_query($sql_find_tag);
		$tag_id=@mysql_insert_id();
		
		$sqTag="
			INSERT INTO `TAG_RELATIONSHIP`
			(`PDF_ID`, `TAG_ID`)
			VALUES
			('{$PDF_ID}', '".$tag_id."')
		;";
		$insertTagResult = @mysql_query($sqTag);
	}
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
window.location = "pdf.php?msg=<?php echo $msg; ?>"
//-->
</script>