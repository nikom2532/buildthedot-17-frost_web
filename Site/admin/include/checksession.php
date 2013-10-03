<?php
	$userid=$_SESSION["userid"];
	if($userid==""){
		header("location: index.php");
	}
?>