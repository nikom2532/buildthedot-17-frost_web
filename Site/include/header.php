<?php
session_start();
<<<<<<< HEAD
include ($rootpath . "lib/func_date.php");
include ($rootpath."lib/connect-db-fon.php");
// include ($rootpath . "lib/db.php");
// include ($rootpath . "lib/conn.inc.php");
// // if (!$db -> open()) {
	// die($db -> error());
// }
=======
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
>>>>>>> ff1ac69c17591894a67b8fbf21251942b6a09848
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MCKANSYS</title>
		<link href="css/reset.css" rel="stylesheet" type="text/css">
		<link href="css/960.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/form.css" rel="stylesheet" type="text/css">
		<script src="js/modernizr-1.6.min.js"></script>
		<script src="js/jquery-1.7.1.min.js"></script>
	</head>
	<body>
