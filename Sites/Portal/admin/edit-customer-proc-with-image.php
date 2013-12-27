<?php

$SQLReadOldImage="
	SELECT `PHOTO_NAME`
	FROM `USER_PROFILE` 
	WHERE `ID` = '".$userID."'
;";
$db->query($SQLReadOldImage);
if($rsReadOldImage=$db->fetchAssoc()) {
	if($rsReadOldImage["PHOTO_NAME"] != ""){
		unlink("../images/user_images/".$rsReadOldImage["PHOTO_NAME"]);
	}
}

$strSQL = "UPDATE USER_PROFILE SET 
	FIRSTNAME='$firstname',
	LASTNAME='$lastname',
	EMAIL='$email',
	COMPANY='$company',
	JOB_TITLE='$jobTitle',
	DEPARTMENT_ID='$department_id',
	INDUSTRY_ID='$industry_id',
	ADDRESS='$address',
	CITY='$city',
	ZIP='$zip',
	COUNTRY_ID='$country_id',
	PHONE='$phone',
	FAX='$fax',
	PHOTO_NAME = '$filename'
";
$strSQL .= "WHERE ID='$userID'";
//echo $filename;
//echo "strQuery=>".$strSQL ;
$cmdQuery = mysql_query($strSQL);

if ($cmdQuery) {
	//header("Location: customer.php");
	?><script>window.location = "customer.php";</script><?php
} else {
	echo "<script>";
	echo "alert('Update profile failed'); ";
	echo "location.href='customer.php'; ";
	echo "</script>";
}
?>