<?php
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
		?>
		<form id="login_finish" action="<?php echo $rootpath.urldecode($_POST["pa"]); ?>" method="POST"></form>
		<script>
			document.getElementById("login_finish").submit();
		</script> 
		<?php
		// header("location: ".$rootpath.urldecode($_POST["pa"]));
	}
	else{
?>

		<form id="login_false_message" action="<?php echo $rootpath; ?>login.php?pa=<?php echo $_POST["pa"]; ?>" method="POST">
			<input type="hidden" id="login_messaage" name="login_messaage" value="login_false" />
		</form>
		<script>
			document.getElementById("login_false_message").submit();
		</script> 
<?php
	}
}
else{
?>
	<form id="login_false_message" action="<?php echo $rootpath; ?>login.php?pa=<?php echo $_POST["pa"]; ?>" method="POST">
		<input type="hidden" id="login_messaage" name="login_messaage" value="forget_formdata_login" />
	</form>
	<script>
		document.getElementById("login_false_message").submit();
	</script>
<?php
}

include($rootpath."include/footer.php");
?>