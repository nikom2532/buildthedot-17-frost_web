<?php
session_start();
$rootpath = "../../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}

$email=$_POST["email"];
$password=$_POST["password"];

// echo "email ".$email;
// echo "pass ".$password;


if(($email!="")&&($password!="")) {

	$email = htmlspecialchars(trim($_POST["email"]),ENT_QUOTES);
	$password_source = htmlspecialchars(trim($_POST["password"]),ENT_QUOTES);
	$password = md5(sha1($password_source)).sha1(md5($password_source));
	unset($password_source);
	
	//echo "pass ".$password."<br/>";
	$SQL="
		SELECT `ID`, `EMAIL`, `PASSWORD`
		FROM  `ADMIN` 
		WHERE  `EMAIL` =  \"{$email}\"
		AND  `PASSWORD` =  \"{$password}\"
	;";
	$result=mysql_query($SQL);
	$num=mysql_num_rows($result);
	// echo $SQL."<br/>";
	// echo "num".$num."<br/>";
	if($num>0){
		$fetchArray=mysql_fetch_array($result);
	
		$_SESSION["userid"] = $fetchArray["ID"];
		//echo "ID=>".$fetchArray["ID"]."<br/>";
		$_SESSION['sessid']=session_id();
		header("location: ../main.php");
		//echo "session".$_SESSION[sessid];
	}
	else{
	?>
		<form id="login_false_message" action="../index.php" method="POST">
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
	<form id="login_false_message" action="../index.php" method="POST">
		<input type="hidden" id="login_messaage" name="login_messaage" value="forget_formdata_login" />
	</form>
	<script>
		document.getElementById("login_false_message").submit();
	</script>
<?php 
}
?>