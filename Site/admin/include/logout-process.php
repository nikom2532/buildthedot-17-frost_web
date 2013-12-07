<?php
	@session_start();
	//echo "before".$_SESSION["userid"];
	unset($_SESSION["userid"]);
	session_destroy();
	
	//echo "after".$_SESSION["userid"];
	//header('location: ../index.php');
	?><script>window.location = "../index.php";</script><?php
?>