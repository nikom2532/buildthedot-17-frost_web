<?php
include("include/header.php"); 
$userID = $_POST['userID'];

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$renewpassword = $_POST['renewpassword'];

echo "userID=>".$userID ."<br/>";
echo "oldpassword=>".$oldpassword ."<br/>";
echo "newpassword=>".$newpassword ."<br/>";
echo "renewpassword=>".$renewpassword ."<br/>";


	$password_source = htmlspecialchars(trim($_POST["oldpassword"]),ENT_QUOTES);
	$oldpassword = md5(sha1($password_source)).sha1(md5($password_source));
	unset($password_source);

	$strQuery ="
		SELECT `ID`, `EMAIL`, `PASSWORD`, `IS_ACTIVE` 
		FROM  `USER_PROFILE` 
		WHERE `PASSWORD` =  \"{$oldpassword}\"
		AND  `IS_ACTIVE` =  'Y'
	;";
	echo "sql=>".$strQuery."<br/>";
	$cmdQuery =  mysql_query($strQuery);
	$num_row= mysql_num_rows($cmdQuery);
	echo "num_row=>".$num_row;
	$fetchArray=mysql_fetch_array($cmdQuery);
	if(mysql_num_rows($cmdQuery) == 1){		
		if($newpassword == $renewpassword){
			$password = md5(sha1($newpassword)).sha1(md5($newpassword));
			$strSQLUpdatePass = "UPDATE user_profile SET PASSWORD='$password'";
			$strSQLUpdatePass.="WHERE ID='$userID'" ;
			
			echo "strQuery=>".$strSQLUpdatePass ;
			$cmdQuery = mysql_query($strSQLUpdatePass);

			if(mysql_affected_rows()){
				header("location: myprofile.php?userID=$userID");
			}
			
			
		}else {
			$passnotmatch = "New Password don't match";
			echo $passnotmatch;
			header("location: edit-password.php?userID=$userID&validatepass=$passnotmatch");
		}
		
	}else if(mysql_num_rows($cmdQuery) == 0){
		$passincorect = "Password is incorrect";
		echo $passincorect;
		header("location: edit-password.php?userID=$userID&validatepass=$passincorect");
		if($newpassword != $renewpassword){
			$passnotmatch = "New Password don't match";
			echo $passincorect;
			header("location: edit-password.php?userID=$userID&validatepass=$passnotmatch");
		
		}
	}
	

?>

