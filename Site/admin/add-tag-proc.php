<?php include("include/header.php");?>
<?php
$tagName1 = $_POST['tagName1'];
$tagName2 = $_POST['tagName2'];
$tagName3 = $_POST['tagName3'];
$tagName4 = $_POST['tagName4'];
$tagName5 = $_POST['tagName5'];
$tagName6 = $_POST['tagName6'];
$tagName7 = $_POST['tagName7'];


if($tagName1 !=""){
	$strSQL="INSERT INTO tag (NAME)
			 VALUES ('$tagName1');";
	$cmdQuery=mysql_query($strSQL);
}
if($tagName2 !=""){
	$strSQL="INSERT INTO tag (NAME)
			 VALUES ('$tagName2');";
	$cmdQuery=mysql_query($strSQL);
}
if($tagName3 !=""){
	$strSQL="INSERT INTO tag (NAME)
			 VALUES ('$tagName3');";
	$cmdQuery=mysql_query($strSQL);
}
if($tagName4 !=""){
	$strSQL="INSERT INTO tag (NAME)
			 VALUES ('$tagName4');";
	$cmdQuery=mysql_query($strSQL);
}
if($tagName5 !=""){
	$strSQL="INSERT INTO tag (NAME)
			 VALUES ('$tagName5');";
	$cmdQuery=mysql_query($strSQL);
}
if($tagName6 !=""){
	$strSQL="INSERT INTO tag (NAME)
			 VALUES ('$tagName6');";
	$cmdQuery=mysql_query($strSQL);
}
if($tagName7 !=""){
	$strSQL="INSERT INTO tag (NAME)
			 VALUES ('$tagName7');";
	$cmdQuery=mysql_query($strSQL);
}

$result = mysql_insert_id();
echo $result;
if(mysql_insert_id() != ""){
	$msg = "Sucess";
	header("location: tag.php?msg=$msg");
}else{
	$msg = "Failed";
	header("location: tag.php?msg=$msg");
	
}
?>