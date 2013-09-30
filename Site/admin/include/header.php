<?php
//session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CMS Mckansys</title>	
	<!-- Stylesheets -->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/reset.css" rel="stylesheet" type="text/css">

	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/script.js"></script>  
	
    <!--Tag It -->
    <link href="css/tagIt/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagIt/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
   	<link href="css/tagIt/jquery-ui.css" rel="stylesheet" type="text/css">
   
    <script src="js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    

	
</head>
<body>