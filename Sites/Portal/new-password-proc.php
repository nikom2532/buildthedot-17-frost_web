
<?php
include("include/header.php"); 
$userID = $_POST['userID'];

$newpassword = $_POST['newpassword'];
$renewpassword = $_POST['renewpassword'];

	$strQuery ="
		SELECT *
		FROM  `USER_PROFILE` 
		WHERE `ID` =  \"{$userID}\"
		AND  `IS_ACTIVE` =  'Y'
	;";
	$cmdQuery =  mysql_query($strQuery);
	$num_row= mysql_num_rows($cmdQuery);
	$fetchArray=mysql_fetch_array($cmdQuery);
	if(mysql_num_rows($cmdQuery) == 1){		
			$password = md5(sha1($newpassword)).sha1(md5($newpassword));
			$strSQLUpdatePass = "UPDATE USER_PROFILE SET PASSWORD='$password'";
			$strSQLUpdatePass.="WHERE ID='$userID'" ;
			
			$cmdQuery = mysql_query($strSQLUpdatePass);
			$result= mysql_affected_rows($cmdQuery);
			
			// remove forget password session
			unset($_SESSION['keySession']); 
			unset($_SESSION['emailSession']); 
			
			//header("location: index.php");
			?><script>window.location = "index.php?";</script><?php
	}
	

?>

