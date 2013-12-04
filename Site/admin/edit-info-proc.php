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

$id = $_POST['infoId'];
$description = $_POST['description'];
echo "Desc".$description;

// echo "userID=>".$userID ."<br/>";
// echo "name=>".$name ."<br/>";
// echo "email=>".$email ."<br/>";

$strSQLUpdateInfo = "UPDATE INFO SET DESCRIPTION='$description' WHERE ID =$id";

//echo "strQuery=>".$strSQLUpdateInfo ;
$cmdQuery = mysql_query($strSQLUpdateInfo);
if(mysql_affected_rows()){
	$msg = "Sucess";
	header("location: home-info.php?msg=$msg");
}else{

	$msg = "Failed";
	header("location: home-info.php?msg=$msg");
}			


