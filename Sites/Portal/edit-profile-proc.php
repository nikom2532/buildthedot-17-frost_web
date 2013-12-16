<?php
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
	FAX='$fax'";
	
	$strSQL .= "WHERE ID='".$_SESSION["userid"]."'";
	//echo "strQuery=>".$strSQL ;
	$cmdQuery = mysql_query($strSQL);
	echo $filename;
	if ($cmdQuery) {
		//header("location: myprofile.php?userID=$userID");
		?><script>window.location = "myprofile.php?userID=<?php echo $userID; ?>";</script><?php
		exit;
	} else {
		echo "<script>";
		echo "alert('Update profile failed'); ";
		echo "location.href='edit_profile.php?userID=$userID'; ";
		echo "</script>";
		exit;
	}
	
?>