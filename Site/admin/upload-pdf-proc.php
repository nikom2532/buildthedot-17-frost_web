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

if ($gLv1 != 0) {
	
} else {
	
}


// $sql = "INSERT INTO PDF (
	// NAME, 
	// PHOTO_NAME,
	// DESCRIPTION,
	// PRICE,
	// UPDATE_DATE,
	// PATH,
	// Is_Asian_country)
// 	
	// VALUES
	// ('$_POST[name]',
	// 'photoname',
	// '$_POST[description]',
	// '$_POST[price]',
	// 'updatedate',
	// 'path',
	// '$_POST[asian]')";
// echo $sql;
$result = mysql_query($sql);
// header("location: upload-pdf.php");
?>