<?php
include ("include/header.php");

$gLv1 = $_POST['gLv1'];
$gLv2 = $_POST['gLv2'];
$gLv3 = $_POST['gLv3'];
$gLv4 = $_POST['gLv4'];
$gLv5 = $_POST['gLv5'];

echo "glv1 > ".$gLv1."<br>";
echo "glv2 > ".$gLv2."<br>";
echo "glv3 > ".$gLv3."<br>";
echo "glv4 > ".$gLv4."<br>";
echo "glv5 > ".$gLv5."<br>";

$sql = "
	INSERT INTO `PDF` (
		`NAME`, 
		`PHOTO_NAME`,
		`DESCRIPTION`,
		`PRICE`,
		`UPDATE_DATE`,
		`PATH`,
		`Is_Asian_country`
	)
	VALUES (
		'{$_POST["name"]}',
		'photoname',
		'{$_POST["description"]}',
		'{$_POST["price"]}',
		'updatedate',
		'path',
		'{$_POST["asian"]}'
	);
";
echo $sql;

// $result = @mysql_query($sql);
$PDF_ID = mysql_insert_id();

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
elseif($gLv5 != 0 || $gLv5 !="") {
	$GROUP_LEVEL_ID = $gLv2;
	$GROUP_LEVEL_NAME = "2";
	;
}
elseif($gLv5 != 0 || $gLv5 !="") {
	$GROUP_LEVEL_ID = $gLv1;
	$GROUP_LEVEL_NAME = "1";
}

echo $sql="
	INSERT INTO `PDF_CATEGORY` (
		`PDF_ID`,
		`GROUP_LEVEL_NAME`,
		`GROUP_LEVEL_ID`
	)
	VALUE (
		'{$PDF_ID}',
		'{$GROUP_LEVEL_ID}',
		'{$GROUP_LEVEL_NAME}'
	)
";

// header("location: upload-pdf.php");
?>