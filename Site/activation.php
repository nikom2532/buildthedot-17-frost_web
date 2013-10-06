<?php
	include("include/header.php"); 
	$email = $_GET['email'];
	$key = $_GET['key'];
	
	session_start();
	$sessionKey = $_SESSION['keySession'];
	$sessionEmail = $_SESSION['emailSession'];
	$now = time(); 

    if($now > $_SESSION['forgotPassExpire']) {
       // session expired
       header("location: index.php");
	   
    } else {
    	if ($sessionKey == $key && $sessionEmail == $email) {
		
			$query  = "SELECT * FROM  USER_PROFILE WHERE EMAIL ='".$email."' AND IS_ACTIVE = 'Y'";
			$result = mysql_query($query);
			$count  = mysql_num_rows($result);
			
			if($count > 0) {
				$row = mysql_fetch_array($result);
				header("location: new-password.php?userID=".$row['ID']);
			}
		
		} else {
			
			// Email or key not match.
			header("location: forgetPassFail.php?e=3");
		}
    }
	
?>