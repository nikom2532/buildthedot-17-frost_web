<?php
include ("include/header.php");
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
$tagName1 = $_POST['tagName1'];
$tagName2 = $_POST['tagName2'];
$tagName3 = $_POST['tagName3'];
$tagName4 = $_POST['tagName4'];
$tagName5 = $_POST['tagName5'];
$tagName6 = $_POST['tagName6'];
$tagName7 = $_POST['tagName7'];



if($tagName1 !=""){
	$strSQL="INSERT INTO TAG (NAME)
			 VALUES ('$tagName1')";
	$cmdQuery=mysql_query($strSQL);
	echo $strSQL;
}
if($tagName2 !=""){
	$strSQL="INSERT INTO TAG (NAME)
			 VALUES ('$tagName2')";
	$cmdQuery=mysql_query($strSQL);
	echo $strSQL;
}
if($tagName3 !=""){
	$strSQL="INSERT INTO TAG (NAME)
			 VALUES ('$tagName3')";
	$cmdQuery=mysql_query($strSQL);
	echo $strSQL;
}
if($tagName4 !=""){
	$strSQL="INSERT INTO TAG (NAME)
			 VALUES ('$tagName4')";
	$cmdQuery=mysql_query($strSQL);
	echo $strSQL;
}
if($tagName5 !=""){
	$strSQL="INSERT INTO TAG (NAME)
			 VALUES ('$tagName5')";
	$cmdQuery=mysql_query($strSQL);
	echo $strSQL;
}
if($tagName6 !=""){
	$strSQL="INSERT INTO TAG (NAME)
			 VALUES ('$tagName6')";
	$cmdQuery=mysql_query($strSQL);
}
if($tagName7 !=""){
	$strSQL="INSERT INTO TAG (NAME)
			 VALUES ('$tagName7')";
	$cmdQuery=mysql_query($strSQL);
	echo $strSQL;
}

$result = mysql_insert_id();
echo $result;
if(mysql_insert_id() != ""){
	$msg = "Sucess";
	echo $msg;
	header("location: tag.php?msg=$msg");
}else{
	$msg = "Failed";
	echo $msg;
	header("location: tag.php?msg=$msg");
	
}
?>