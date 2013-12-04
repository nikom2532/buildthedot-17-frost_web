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
	
	$userId = $_POST['userId'];
	$delId = $_POST['delId'];
	$deleteInPermission = mysql_query("DELETE FROM PERMISSION WHERE ID=$delId");
    header("location: permission.php?userId=$userId");
?>