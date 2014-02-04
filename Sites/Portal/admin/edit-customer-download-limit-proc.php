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
?>

<?php
	
	$userID = $_POST['userId'];
	$LIMIT_DOWNLOAD = $_POST["LIMIT_DOWNLOAD"];
	
	$sql_download_limit = "
		SELECT * 
		FROM  `USER_LIMIT_DOWNLOAD`
		WHERE `USER_ID` = '{$userID}' ;
	";
	
		
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
			//header("location: customer.php?msg=$msg");
			?><script>window.location = "customer.php?msg=<?php echo $msg; ?>";</script><?php
		} else {
			$msg = "Failed";
			//header("location: customer.php?msg=$msg");
			?><script>window.location = "customer.php?msg=<?php echo $msg; ?>";</script><?php
		}
		
?>