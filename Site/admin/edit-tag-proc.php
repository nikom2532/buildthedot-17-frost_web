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
$tagId = $_POST['tagId'];
$tagName = $_POST['tagName'];

$strSQL="UPDATE tag SET NAME='$tagName' WHERE ID='$tagId'";
$cmdQuery=mysql_query($strSQL);

if(mysql_affected_rows()){
	header("location: tag.php");
}else{
	"<sript>alert('The process failed')</script>";
	
}
?>