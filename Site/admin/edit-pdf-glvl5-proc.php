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
$PDF_ID = $_POST['pdfId'];
$tag = $_POST['tag'];
$mySingleField = $_POST['mySingleField'];


$gLv1 = $_POST['$gLv1Id'];
$gLv2 = $_POST['$gLv2Id'];
$gLv3 = $_POST['$gLv3Id'];
$gLv4 = $_POST['$gLv4Id'];
$gLv5 = $_POST['$gLv5Id'];

//echo $tag;
echo "glv1 > ".$gLv1."<br>";
echo "glv2 > ".$gLv2."<br>";
echo "glv3 > ".$gLv3."<br>";
echo "glv4 > ".$gLv4."<br>";
echo "glv5 > ".$gLv5."<br>";


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

echo $sqlCat="
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

?>
<form id="edit-pdf-glvl" name="edit-pdf-glvl" action="edit-pdf.php" method="POST">
	<input type="hidden" name="pdfId" value="<?php echo $PDF_ID; ?>" />
	<input type="hidden" name="glvId" value="<?php echo $GROUP_LEVEL_ID; ?>" />
	<input type="hidden" name="glvName" value="<?php echo $GROUP_LEVEL_NAME; ?>" />
</form>
<script>
<!--
	//document.getElementById("edit-pdf-glvl").submit();
/*window.location = "pdf.php?msg=<?php //echo $msg; ?>"*/
//-->
</script>