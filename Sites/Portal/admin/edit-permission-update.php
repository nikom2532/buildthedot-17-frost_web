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
	$userId=$_POST['userId'];
	$editId=$_POST['editId'];
	$groupId=$_POST['groupLv2'];
	$userProfileId=$_POST['userId'];
	$isActive=$_POST['status'];
	$originalDateStartDate = $_POST['startDate'];
	$newDateStartDate = date("Y-m-d 00:00:00", strtotime($originalDateStartDate));
	$originalDateEndDate = $_POST['endDate'];
	$newDateEndDate = date("Y-m-d 00:00:00", strtotime($originalDateEndDate));
	
	$strSQL = "UPDATE PERMISSION SET 
	GROUP_LV2_ID='$groupId',
	USER_PROFILE_ID='$userProfileId',
	IS_ACTIVE='$isActive',
	START_DATE='$newDateStartDate',
	END_DATE='$newDateEndDate'";
	
	$strSQL .= "WHERE ID='".$editId."'";
	// echo "strQuery=>".$strSQL ;
	$cmdQuery = mysql_query($strSQL);
	//header("location: permission.php?userId=$userId");
	?><script>window.location = "permission.php?userId=<?php echo $userId; ?>";</script><?php
?>