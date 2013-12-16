<?php
	//include ("include/header.php");
	$userId = $_POST['userId'];
	$originalDateStartDate = $_POST['startDate'];
	$newDateStartDate = date("Y-m-d 00:00:00", strtotime($originalDateStartDate));
	
	$originalDateEndDate = $_POST['endDate'];
	$newDateEndDate = date("Y-m-d 00:00:00", strtotime($originalDateEndDate));
									
	$sql="INSERT INTO PERMISSION (GROUP_LV2_ID, USER_PROFILE_ID, START_DATE, END_DATE, IS_ACTIVE)
	VALUES
	('$_POST[groupLv2]','$_POST[userId]','$newDateStartDate','$newDateEndDate','$_POST[status]')";
	
	$result = mysql_query($sql);
	//header("location: permission.php?userId=$userId");
	?><script>window.location = "permission.php?userId=<?php echo $userId; ?>";</script><?php
?>