<?php
include($rootpath."include/header.php");
unset($_SESSION["userid"]);
include($rootpath."include/footer.php");

if(strstr(urldecode($_GET["pa"]), '?', true) == "/myprofile.php"){
	header("Location: ".$rootpath."./index.php");
}
else{
	header("Location: ".$rootpath.urldecode($_GET["pa"]));
}
?>