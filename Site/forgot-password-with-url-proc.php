<?php
	include("include/header.php"); 
	$email = $_POST['email'];

	$email = htmlspecialchars(trim($_POST["email"]),ENT_QUOTES);
	$query = "SELECT * FROM  USER_PROFILE WHERE EMAIL ='".$email."' AND IS_ACTIVE = 'Y'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	if($count > 0) {
		$row = mysql_fetch_array($result);
		
		// header("location: {$rootpath}forgot-password-question.php?qId=".$row['QUESTION_ID']."&id=".$row['ID']);
		
		$key=rand(100,999);
		$key=md5($key);
		$_SESSION["keySession"] = $key;
		
		// $email_from = "wc.fone@yahoo.com";
	    // $email_to = "team@buildthedot.com";
	    // $email_subject = "[Mckansys] Forgot password";
	    // $email_message = "You activation link is: http://mckansys.buildthedot.com/activation.php?email=$email&key=$key";
		// $headers = 'From: '.$email_from."\r\n".
		// 'Reply-To: '.$email_to."\r\n" .
		// 'X-Mailer: PHP/' . phpversion();
		// $result = @mail($email_to, $email_subject, $email_message, $headers);  
		
		$to      = "team@buildthedot.com";
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