<?php
session_start();
include($rootpath."lib/func_date.php");
include($rootpath."lib/db.php");
include($rootpath."lib/conn.inc.php");
if (!$db->open()){
        die($db->error());
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

</head>

<body>