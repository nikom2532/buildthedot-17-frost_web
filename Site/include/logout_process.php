<?php
include($rootpath."include/header.php");
unset($_SESSION["userid"]);
include($rootpath."include/footer.php");;
header("Location: ".$rootpath.".".urldecode($_GET["pa"]));
?>