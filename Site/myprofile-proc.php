
<?php 
// $userID = 8;
$userID = $_GET['userID'];

$strQuery = "";
$strQuery = "SELECT * FROM user_profile WHERE ID ='$userID'";
//echo "strQuery=>".$strQuery ;
$cmdQueryMyprofile =  mysql_query($strQuery);
$Num_Rows = mysql_num_rows($cmdQueryMyprofile);
//echo "userID=>".$userID;
?>
