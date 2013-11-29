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
	
	$strSQL .= "WHERE ID='$userID'";
	//echo "strQuery=>".$strSQL ;
	$cmdQuery = mysql_query($strSQL);
	//echo $filename;
	if ($cmdQuery) {
		$msg = "Sucess";
		header("location: customer.php?msg=$msg");
	} else {
		$msg = "Failed";
		header("location: customer.php?msg=$msg");
	}
?>