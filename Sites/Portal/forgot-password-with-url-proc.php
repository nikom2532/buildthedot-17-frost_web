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
		$_SESSION['forgotPassStart'] = time();
		$_SESSION['forgotPassExpire'] = $_SESSION['forgotPassStart'] + (10 * 60) ; // 10 minute

		$to      = $email;
		$subject = "[Mckansys Portal] Forgot password";
		
		$message = "You activation link is: http://portal.mckansys.com/activation.php?email=$email&key=$key";
		//$message = "You activation link is: http://arming/mckansys/buildthedot-17-frost_web/Sites/Portal/activation.php?email=$email&key=$key";
		//$message = "You activation link is: http://portal.mckansys.com/_test/activation.php?email=$email&key=$key";
		
		$headers = "From: noreply@mckansys.com " . "\r\n" .
	    "Bcc: buildthedot@mckansys.com, admin@mckansys.com, sukanya@mckansys.com, noreply@mckansys.com" . "\r\n" .
	    "X-Mailer: PHP/" . phpversion();
		
		//$headers = "Reply-To: buildthedot@mckansys.com, admin@mckansys.com, sukanya@mckansys.com, noreply@mckansys.com" . "\r\n";
		
		if (mail($to, $subject, $message, $headers)) {
			// send success
			//header("location: forgetPassSuccess.php");
			?><script>window.location = "forgetPassSuccess.php";</script><?php
		} else {
			// send fail
			//header("location: forgetPassFail.php?e=1");
			?><script>window.location = "forgetPassFail.php?e=1";</script><?php
		}
	} else {
		// record not found
		//header("location: forgetPassFail.php?e=2");
		?><script>window.location = "forgetPassFail.php?e=2";</script><?php
	}
?>
<?php  include("include/footer.php"); ?>