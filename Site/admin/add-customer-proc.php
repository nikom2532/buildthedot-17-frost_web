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
  	$firstname = $_POST[firstname];
	$lastname = $_POST[lastname];
	$email = $_POST[email];
	$company = $_POST[company];
	$jobTitle = $_POST[jobTitle];
	$department_id = $_POST[department_id];
	$industry_id = $_POST[industry_id];
	$address = $_POST[address];
	$city = $_POST[city];
	$zip = $_POST[zip];
	$country = $_POST[country];
	$phone = $_POST[phone];
	$fax = $_POST[fax];
	$password = $_POST[password];
	$passwordmd5 = md5(sha1($password)).sha1(md5($password));
	
if(!(!file_exists($_FILES['imageUpload']['tmp_name']) || !is_uploaded_file($_FILES['imageUpload']['tmp_name']))){
		
		if ($_FILES["imageUpload"]["error"] > 0) {
			echo "Error: " . $_FILES["imageUpload"]["error"] . "<br>";
		} else {
			echo "Upload: " . $_FILES["imageUpload"]["name"] . "<br>";
			echo "Type: " . $_FILES["imageUpload"]["type"] . "<br>";
			echo "Size: " . ($_FILES["imageUpload"]["size"] / 1024) . " kB<br>";
			echo "Stored in: " . $_FILES["imageUpload"]["tmp_name"] . "<br>";
		}
	
		$image_target_path = "../images/user_images/";
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
	        ImageJPEG($images_fin,"../images/user_images/".$imageFileName);
	        ImageDestroy($images_orig);
	        ImageDestroy($images_fin);
		}
		if($_FILES["imageUpload"]["type"] == "image/png"){
	        $images_orig = ImageCreateFromPNG($images);
	        $photoX = ImagesX($images_orig);
	        $photoY = ImagesY($images_orig);
	        $images_fin = ImageCreateTrueColor($width, $height);
	        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	        ImagePNG($images_fin,"../images/user_images/".$imageFileName);
	        ImageDestroy($images_orig);
	        ImageDestroy($images_fin);
		}
		if($_FILES["imageUpload"]["type"] == "image/gif"){
	        $images_orig = ImageCreateFromGIF($images);
	        $photoX = ImagesX($images_orig);
	        $photoY = ImagesY($images_orig);
	        $images_fin = ImageCreateTrueColor($width, $height);
	        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	        ImageGIF($images_fin,"../images/user_images/".$imageFileName);
	        ImageDestroy($images_orig);
	        ImageDestroy($images_fin);
		}

}else{
	$imageFileName = "no-image.png";
}
// check duplicate email
	$sqlCheckDup = "SELECT EMAIL FROM USER_PROFILE WHERE EMAIL = '$email'";
	$result = mysql_query($sqlCheckDup);
	$numRow = mysql_num_rows($result);	
	echo "Num row>".$numRow."<br/>";
	if($numRow>=1){
		$msg = "Duplicate Email";
		header("location: customer.php?msg=$msg");
		?><script>window.location = "customer.php?msg=<?php echo $msg; ?>";</script><?php		
	}


echo $sql = "INSERT INTO USER_PROFILE (PHOTO_NAME, 
	FIRSTNAME, 
	LASTNAME, 
	EMAIL, 
	COMPANY,
	JOB_TITLE,
	DEPARTMENT_ID,
	INDUSTRY_ID,
	ADDRESS,
	CITY,
	ZIP,
	COUNTRY_ID,
	PHONE,
	FAX,
	PASSWORD,
	JOB_LEVEL, 
	TECHNOLOGY_ID)
	
	VALUES
	('$imageFileName',
	'$firstname',
	'$lastname',
	'$email',
	'$company',
	'$jobTitle',
	'$department_id',
	'$industry_id',
	'$address',
	'$city',
	'$zip',
	'$country',
	'$phone',
	'$fax',
	'$passwordmd5',
	'1',
	'1')";
// echo $sql;
$result = mysql_query($sql);

$sqlChkResult = "SELECT EMAIL FROM USER_PROFILE WHERE EMAIL = '$email'";
$resultChk = mysql_query($sqlChkResult);
$numChk = mysql_num_rows($resultChk);	
echo "Num row chk>".$numChk."<br/>";

if($numChk==1){
	$msg = "Success";
	//header("location: customer.php?msg=$msg");
	?><script>window.location = "customer.php?msg=<?php echo $msg; ?>";</script><?php
		
}else{
	$msg = "Failed";
	//header("location: customer.php?msg=$msg");
	?><script>window.location = "customer.php?msg=<?php echo $msg; ?>";</script><?php
}

?>