<?php
	include("include/header.php"); 
	$email = $_POST['email'];

	$email = htmlspecialchars(trim($_POST["email"]),ENT_QUOTES);
	$query = "SELECT * FROM  USER_PROFILE WHERE EMAIL ='".$email."' AND IS_ACTIVE = 'Y'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	if($count > 0) {
		$row = mysql_fetch_array($result);
		
		$date = date_create();
		$key=date_timestamp_get($date);
		$key=md5($key);
		$_SESSION["keySession"] = $key;
		$_SESSION["emailSession"] = $email; 
		
		$to      = "voravan@buildthedot.com";
		$subject = "[Mckansys] Forgot password";
		$message = "You activation link is: http://mckansys.buildthedot.com/activation.php?email=$email&key=$key";
		$headers = "From: team@buildthedot.com" . "\r\n" .
	    "Reply-To: team@buildthedot.com" . "\r\n" .
	    "X-Mailer: PHP/" . phpversion();
	
		mail($to, $subject, $message, $headers);
		
		header("location: index.php");
		
	} else {
		
		header("location: index.php");
	}
?>