<?php
	$sess_id=$_SESSION["userid"];
	if($sess_id==""){
		header("location: index.php");
	}
?>