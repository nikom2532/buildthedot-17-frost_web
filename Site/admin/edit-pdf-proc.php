<?php include("include/header.php");?>
<?php
$pdfId = $_POST['pdfId'];
$tag = $_POST['tag'];
$mySingleField = $_POST['mySingleField'];

echo $tag;
echo $mySingleField;

//$strSQL="UPDATE tag SET NAME='$tagName' WHERE ID='$tagId'";
//$cmdQuery=mysql_query($strSQL);

if(mysql_affected_rows()){
	//header("location: tag.php");
}else{
	//"<sript>alert('The process failed')</script>";
	
}
?>