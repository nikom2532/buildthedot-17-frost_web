<?php
ob_start();
include("include/header.php"); 
$userID = $_POST['userID'];

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$renewpassword = $_POST['renewpassword'];

//echo "userID=>".$userID ."<br/>";
//echo "oldpassword=>".$oldpassword ."<br/>";
//echo "newpassword=>".$newpassword ."<br/>";
//echo "renewpassword=>".$renewpassword ."<br/>";


	$password_source = htmlspecialchars(trim($_POST["oldpassword"]),ENT_QUOTES);
	$oldpassword = md5(sha1($password_source)).sha1(md5($password_source));
	unset($password_source);

	$strQuery ="
		SELECT `ID`, `EMAIL`, `PASSWORD`, `IS_ACTIVE` 
		FROM  `USER_PROFILE` 
		WHERE `PASSWORD` =  \"{$oldpassword}\"
		AND  `ID` =  \"{$userID}\"
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
			$strSQLUpdatePass = "UPDATE USER_PROFILE SET PASSWORD='$password'";
			$strSQLUpdatePass.="WHERE ID='$userID'" ;
			
			echo "strQuery=>".$strSQLUpdatePass ;
			$cmdQuery = mysql_query($strSQLUpdatePass);
			
			if(mysql_affected_rows()){
				//header("location: myprofile.php?userID=$userID");
				?><script>window.location = "myprofile.php?userID=<?php echo $userID; ?>";</script><?php
			}
			// if($oldpassword == ($newpassword == $renewpassword)){
				//header("location: myprofile.php?userID=$userID");
			// }

		}else {
			$passnotmatch = "New Password don't match";
			echo $passnotmatch;
			//header("location: edit-password.php?userID=$userID&validatepass=$passnotmatch");
			?><script>window.location = "edit-password.php?userID=<?php echo $userID; ?>&validatepass=<?php echo $passnotmatch; ?>";</script><?php
		}
		
	}else if(mysql_num_rows($cmdQuery) == 0){
		$passincorect = "Password is incorrect";
		echo $passincorect;
		//header("location: edit-password.php?userID=$userID&validatepass=$passincorect");
		?><script>window.location = "edit-password.php?userID=<?php echo $userID; ?>&validatepass=<?php echo $passincorect; ?>";</script><?php
		if($newpassword != $renewpassword){
			$passnotmatch = "New Password don't match";
			echo $passincorect;
			//header("location: edit-password.php?userID=$userID&validatepass=$passnotmatch");
			?><script>window.location = "edit-password.php?userID=<?php echo $userID; ?>&validatepass=<?php echo $passnotmatch; ?>";</script><?php
		}
	}
	
ob_end_flush();
?>
