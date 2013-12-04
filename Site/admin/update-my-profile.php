<?php
include ("include/header.php");
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}

$userID = $_SESSION["userid"];
$name = $_POST['name'];
$email = $_POST['email'];


// echo "userID=>".$userID ."<br/>";
// echo "name=>".$name ."<br/>";
// echo "email=>".$email ."<br/>";

$strSQLUpdateProfile = "UPDATE ADMIN SET NAME='$name',EMAIL='$email' ";
$strSQLUpdateProfile .= "WHERE ID='$userID'" ;

echo "strQuery=>".$strSQLUpdateProfile ;
$cmdQuery = mysql_query($strSQLUpdateProfile);
if(mysql_affected_rows()){
	header("location: my-profile.php?userID=$userID");
}else{
?>
	<form id="msg-error-form" action="edit-my-profile.php" method="POST">
		<input type="hidden" id="msg-error" name="msg-error" value="Can't edit my profile" />
	</form>
	<script>
		document.getElementById("msg-error-form").submit();
	</script>	
<?php 
}			
?>

