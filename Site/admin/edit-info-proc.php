<?php
include("include/header.php");

$description = $_POST['description'];
echo "Desc".$description;

// echo "userID=>".$userID ."<br/>";
// echo "name=>".$name ."<br/>";
// echo "email=>".$email ."<br/>";

$strSQLUpdateInfo = "UPDATE INFO SET DESCRIPTION='$description' WHERE ID ='1'";

//echo "strQuery=>".$strSQLUpdateInfo ;
$cmdQuery = mysql_query($strSQLUpdateInfo);
if(mysql_affected_rows()){
	$msg = "Sucess";
	header("location: home-info.php?msg=$msg");
}else{

	$msg = "Failed";
	header("location: home-info.php?msg=$msg");
}			


