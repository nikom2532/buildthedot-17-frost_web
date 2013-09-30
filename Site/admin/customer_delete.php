<?php
	include ("include/header.php");
	
	$userId = $_POST['userId'];
	
	$deleteInPermission = mysql_query("DELETE FROM PERMISSION WHERE USER_PROFILE_ID=$userId");
    $deleteInUserProfile = mysql_query("DELETE FROM USER_PROFILE WHERE ID=$userId");
    if($delete && $deleteInPermission){
        header("location: customer.php");
    } else {
    	header("location: customer.php");
		
    }
?>