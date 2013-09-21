<?php
include ("include/header.php");
?>

<?php
$userID = $_POST['userID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$company = $_POST['company'];
$jobTitle = $_POST['jobTitle'];
$department_id = $_POST['department'];
$industry_id = $_POST['industry'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country_id = $_POST['country'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];


$strSQL = "UPDATE USER_PROFILE SET 
FIRSTNAME='$firstname',
LASTNAME='$lastname',
EMAIL='$email',
COMPANY='$company',
JOB_TITLE='$jobTitle',
DEPARTMENT_ID='$department_id',
INDUSTRY_ID='$industry_id',
ADDRESS='$address',
CITY='$city',
ZIP='$zip',
COUNTRY_ID='$country_id',
PHONE='$phone',
FAX='$fax'";

$strSQL .= "WHERE ID='$userID'";
//echo "strQuery=>".$strSQL ;
$cmdQuery = mysql_query($strSQL);

if ($cmdQuery) {
	header("Location: myprofile.php?userID=$userID");
} else {
	echo "<script>";
	echo "alert('Update profile failed'); ";
	echo "location.href='edit_profile.php?userID=$userID'; ";
	echo "</script>";
}
?>

