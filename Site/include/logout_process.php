<?php
$rootpath ="../";
include($rootpath."include/header.php");

unset($_SESSION["username"]);

include($rootpath."include/footer.php");

header("Location: {$rootpath}./index.php");
?>