<?php include("include/header.php");?>
<?php
$tagId = $_POST['tagId'];
$tagName = $_POST['tagName'];

$strSQL="UPDATE tag SET NAME='$tagName' WHERE ID='$tagId'";
$cmdQuery=mysql_query($strSQL);

if(mysql_affected_rows()){
	header("location: tag.php");
}else{
	"<sript>alert('The process failed')</script>";
	
}
?>