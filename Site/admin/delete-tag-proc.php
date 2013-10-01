<?php include("include/header.php");?>
<?php
$tagId = $_POST['tagId'];

$strSQL="DELETE FROM tag WHERE ID='$tagId'";
$cmdQuery=mysql_query($strSQL);

if($cmdQuery){
	header("location: tag.php");
}else{
	"<sript>alert('The process failed')</script>";
	
}
?>