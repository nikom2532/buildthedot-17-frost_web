﻿<?php
$rootpath ="../";
include($rootpath."include/header.php");

$email=$_POST["email"];
$password=$_POST["password"];
if(($email!="")&&($password!="")) {

	$email = htmlspecialchars(trim($_POST["email"]),ENT_QUOTES);
	$password_source = htmlspecialchars(trim($_POST["password"]),ENT_QUOTES);
	$password = md5(sha1($password_source)).sha1(md5($password_source));
	unset($password_source);

	$SQL="
		SELECT `ID`, `EMAIL`, `PASSWORD`, `IS_ACTIVE` 
		FROM  `USER_PROFILE` 
		WHERE  `EMAIL` =  \"{$email}\"
		AND  `PASSWORD` =  \"{$password}\"
		AND  `IS_ACTIVE` =  'Y'
	;";
	$db->query($SQL);
	if($rs=$db->fetchAssoc()){
		$_SESSION["userid"]=$rs["ID"];
		// header("location: {$rootpath}download-pdf.php?pdfId=".$_POST["pdfId"]);
		// header("location: {$rootpath}report-detail-no-sidemenu.php?id=".$_POST["pdfId"]);
		?><script>window.location = "<?php echo $rootpath; ?>report-detail-no-sidemenu.php?id=<?php echo $_POST["pdfId"]; ?>";</script><?php
	}
	else{
?>
		<form id="login_false_message" action="<?php echo $rootpath; ?>download-pdf.php?pdfId=<?php echo $_POST["pdfId"]; ?>" method="POST">
			<input type="hidden" id="login_messaage" name="login_messaage" value="login_false" />
		</form>
		<script>
			document.getElementById("login_false_message").submit();
		</script>
<?php
	}
}
else{
	//header("location: {$rootpath}download-pdf.php?pdfId=".$_POST["pdfId"]);
	?><script>window.location = "<?php echo $rootpath; ?>download-pdf.php?pdfId=<?php echo $_POST["pdfId"]; ?>";</script><?php
}

// include($rootpath."include/footer.php");
?>