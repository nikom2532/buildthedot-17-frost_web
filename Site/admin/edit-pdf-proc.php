<?php include("include/header.php");?>
<?php
$PDF_ID = $_POST['pdfId'];
$tag = $_POST['tag'];
$mySingleField = $_POST['mySingleField'];


$gLv1 = $_POST['gLv1'];
$gLv2 = $_POST['gLv2'];
$gLv3 = $_POST['gLv3'];
$gLv4 = $_POST['gLv4'];
$gLv5 = $_POST['gLv5'];
$tag = $_POST['tags'];
//echo $tag;
//echo "glv1 > ".$gLv1."<br>";
//echo "glv2 > ".$gLv2."<br>";
//echo "glv3 > ".$gLv3."<br>";
//echo "glv4 > ".$gLv4."<br>";
//echo "glv5 > ".$gLv5."<br>";
//echo "tag > ".$tag."<br>";

$current_time = date("Y-m-d H:i:s");
$sqlPdf = "
	UPDATE `PDF` 
	SET 
		`NAME` =  '{$_POST["name"]}' ,
		`PHOTO_NAME` = '{$imageFileName}' ,
		`DESCRIPTION` = '{$_POST["description"]}' ,
		`PRICE` = '{$_POST["price"]}' ,
		`UPDATE_DATE` = '{$current_time}' ,
		`PATH` = '{$pdfFileName}' ,
		`Is_Asian_country` = '{$_POST["asian"]}'
	WHERE `ID` = '{$PDF_ID}'
;";
$insertPdfResult = @mysql_query($sqlPdf);
//##$result = @mysql_query($sql);

$string_tag = explode(',', $tag);
foreach($string_tag as $tag) {
	echo $sqTag="
		UPDATE `TAG_RELATIONSHIP`
		SET `TAG_ID` = '{$tag}'
		WHERE `PDF_ID` = '{$PDF_ID}' 		
	;";
	$insertTagResult = @mysql_query($sqTag);
}


if ($gLv5 != 0 || $gLv5 !="") {
	$GROUP_LEVEL_ID = $gLv5;
	$GROUP_LEVEL_NAME = "5";
}
elseif($gLv4 != 0 || $gLv4 !="") {
	$GROUP_LEVEL_ID = $gLv4;
	$GROUP_LEVEL_NAME = "4";
}
elseif($gLv3 != 0 || $gLv3 !="") {
	$GROUP_LEVEL_ID = $gLv3;
	$GROUP_LEVEL_NAME = "3";
}
elseif($gLv2 != 0 || $gLv2 !="") {
	$GROUP_LEVEL_ID = $gLv2;
	$GROUP_LEVEL_NAME = "2";
	;
}
elseif($gLv1 != 0 || $gLv1 !="") {
	$GROUP_LEVEL_ID = $gLv1;
	$GROUP_LEVEL_NAME = "1";
}

$sqlCat="
	UPDATE `PDF_CATEGORY`
	SET
		`GROUP_LEVEL_NAME` = '{$GROUP_LEVEL_NAME}',
		`GROUP_LEVEL_ID` = '{$GROUP_LEVEL_ID}'
	WHERE
		`PDF_ID` = '{$PDF_ID}'
;";

$insertCatResult = mysql_query($sqlCat);
$msg = "Success";

//header("location: pdf.php?msg=$msg");
	
//$strSQL="UPDATE tag SET NAME='$tagName' WHERE ID='$tagId'";
//$cmdQuery=mysql_query($strSQL);

// if(mysql_affected_rows()){
	//header("location: tag.php");
// }else{
	//"<sript>alert('The process failed')</script>";
// }
?>
<script>
<!--
window.location = "pdf.php?msg=<?php echo $msg; ?>"
//-->
</script>