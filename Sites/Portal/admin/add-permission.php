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
	$userId = $_POST['userId'];
	$originalDateStartDate = $_POST['startDate'];

	$newDateStartDate = date("Y-m-d 00:00:00", strtotime($originalDateStartDate));
	echo $userId;
	echo $originalDateStartDate;
	echo $newDateStartDate;
	
	$originalDateEndDate = $_POST['endDate'];
	$newDateEndDate = date("Y-m-d 00:00:00", strtotime($originalDateEndDate));
									
	$sql="INSERT INTO PERMISSION (GROUP_LV2_ID, USER_PROFILE_ID, START_DATE, END_DATE, IS_ACTIVE)
	VALUES
	('$_POST[groupLv2]','$_POST[userId]','$newDateStartDate','$newDateEndDate','$_POST[status]')";
	
	$result = mysql_query($sql);
	//header("location: permission.php?userId=$userId");
	?><script>window.location = "permission.php?userId=<?php echo $userId; ?>";</script><?php
?>