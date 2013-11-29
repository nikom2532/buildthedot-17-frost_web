<?php
	include ("include/header.php");
	
	$userId = $_POST['userId'];
	$delId = $_POST['delId'];
	$deleteInPermission = mysql_query("DELETE FROM PERMISSION WHERE ID=$delId");
    header("location: permission.php?userId=$userId");
?>