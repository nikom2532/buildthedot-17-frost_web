<?php include("include/header.php");?>

<?php 
$userID = $_POST['userID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$email = $_POST['email'];

$strSQL = "UPDATE user_profile SET FIRSTNAME='$firstname',LASTNAME='$lastname',COMPANY='$company',EMAIL='$email'";
$strSQL.="WHERE ID='$userID'" ;
//echo "strQuery=>".$strSQL ;
$cmdQuery = mysql_query($strSQL);

	if($cmdQuery){
		header( "Location: myprofile.php?userID=$userID" );
	}else{
		echo "<script>";
		echo "alert('Update profile failed'); ";
		echo "location.href='edit_profile.php?userID=$userID'; ";
		echo "</script>";
	}
?>

