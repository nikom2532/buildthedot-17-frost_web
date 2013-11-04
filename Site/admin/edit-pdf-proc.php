<?php include("include/header.php");?>
<?php
$pdfId = $_POST['pdfId'];
$tag = $_POST['tag'];
$mySingleField = $_POST['mySingleField'];

$tag = $_POST['tags'];
echo $tag;
$string_tag = explode(',', $tag);
foreach($string_tag as $tag) {
    //echo $tag;
	$sqTag="
	INSERT INTO `TAG_RELATIONSHIP` (
		`PDF_ID`,
		`TAG_ID`
	)
	VALUE (
		'{$PDF_ID}',
		'{$tag}'
	)
";
}


//$strSQL="UPDATE tag SET NAME='$tagName' WHERE ID='$tagId'";
//$cmdQuery=mysql_query($strSQL);

if(mysql_affected_rows()){
	//header("location: tag.php");
}else{
	//"<sript>alert('The process failed')</script>";
	
}
?>