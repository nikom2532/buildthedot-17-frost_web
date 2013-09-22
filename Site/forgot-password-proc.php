<?php
include("include/header.php"); 
$email = $_POST['email'];

$email = htmlspecialchars(trim($_POST["email"]),ENT_QUOTES);
	$query = "SELECT * FROM  USER_PROFILE WHERE EMAIL ='".$email."'";
				$result = mysql_query($query) OR die(mysql_error());
				$count = mysql_num_rows($result);
	if($count > 0) {
		$row = mysql_fetch_array($result);
		
		$strTo = $row["EMAIL"];
		$strSubject = "Your Account information username and password.";
		$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
		$strHeader .= "From: admin@mckansys.com\nReply-To: admin@mckansys.com";
		$strMessage = "";
		$strMessage .= "Welcome : ".$row["FIRSTNAME"]."&nbsp;&nbsp;".$row["LASTNAME"]."<br>";
		$strMessage .= "Username : ".$email."<br>";
		$strMessage .= "Password : ".$row["PASSWORD"]."<br>";
		$strMessage .= "=================================<br>";
		$strMessage .= "Mckansys.Com<br>";
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);
		
		header("location: {$rootpath}index.php");
	}
?>