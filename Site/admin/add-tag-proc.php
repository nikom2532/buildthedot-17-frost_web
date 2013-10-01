<?php include("include/header.php");?>
<?php
$tagName = $_POST['tagName'];

$strSQL="INSERT INTO tag (NAME)
VALUES ('$tagName');";
$cmdQuery=mysql_query($strSQL);

if($cmdQuery){
	header("location: tag.php");
}else{
	"<sript>alert('The process failed')</script>";
	
}
?>