<?php
	$userid=$_SESSION["userid"];
	if($userid==""){
		//header("location: index.php");
		?><script>window.location = "index.php";</script><?php
	}
?>