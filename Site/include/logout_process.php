<?php
$rootpath ="../";
include($rootpath."include/header.php");

unset($_SESSION["userid"]);
//echo $_SESSION["userid"];
include($rootpath."include/footer.php");

header("Location: {$rootpath}./index.php");
?>