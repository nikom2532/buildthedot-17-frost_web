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

$strSQL="DELETE FROM TAG WHERE ID='$tagId'";
$cmdQuery=mysql_query($strSQL);
echo $strSQL;
if($cmdQuery){
	$msg = "Sucess";
	echo $msg;
	header("location: tag.php?msg=$msg");
}else{
	$msg = "Failed";
	echo $msg;
	header("location: tag.php?msg=$msg");
	
}
?>