<?php
	include("include/header.php"); 
	$email = $_GET['email'];
	$key = $_GET['key'];
	
	session_start();
	$sessionKey = $_SESSION['keySession'];
	
	$inactive = 600;

	if (isset($_SESSION['keySession'])) {
	    $session_life = time() - $_SESSION['keySession'];
	    if ($session_life > $inactive) {
	        session_destroy();
	        header("Location: index.php");
	    }
	}
	$_SESSION['timeout'] = time();

	if ($sessionKey == $key) {
		
		$query  = "SELECT * FROM  USER_PROFILE WHERE EMAIL ='".$email."' AND IS_ACTIVE = 'Y'";
		$result = mysql_query($query);
		$count  = mysql_num_rows($result);
		
		if($count > 0) {
			$row = mysql_fetch_array($result);
			echo "id is > ".$row['ID'];
			header("location: new-password.php?userID=".$row['ID']);
		}
		
	} else {
		header("location: index.php");
	}
?>