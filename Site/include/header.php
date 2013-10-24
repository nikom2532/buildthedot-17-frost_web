<?php
session_start();
include ($rootpath . "lib/db.php");
//include ($rootpath."lib/connect-db-fon.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
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
		<script src="js/jquery.validate.min.js"></script>
		<!-- <script src="js/validate.message.js"></script> -->
	<script type="text/javascript">
		$("input").keypress(function(event) {
		       if (event.which == 13) {
		        event.preventDefault();
		        $("search-form").submit();
    	}
		});


		
		
	</script>
	</head>
<body>