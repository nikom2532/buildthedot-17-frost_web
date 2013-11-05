<?php
session_start();
?>

<?php
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
	<script src="../js/script.js"></script>
	
    <!--Tag It -->
    <!-- <link href="css/tagIt/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagIt/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
   	<link href="css/tagIt/jquery-ui.css" rel="stylesheet" type="text/css">
    <script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script> -->
    
      <!--Tag It -->
    <link href="css/tagIt/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagIt/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
   	<link href="css/tagIt/jquery-ui.css" rel="stylesheet" type="text/css">
   	<link href="css/jquery_notification.css" rel="stylesheet" type="text/css"> 
    <script src="js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    
	<!--Date picker -->
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/date-picker/jquery.ui.core.js"></script>
	<script src="js/datep-icker/jquery.ui.datepicker.js"></script>
	<script src="js/date-picker/jquery.ui.widget.js"></script>   
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
	
	<script src="js/jquery_notification_v.1.js"></script>
	<!-- <script src="js/jquery_v_1.4.js"></script>  -->
	
</head>
<body>

