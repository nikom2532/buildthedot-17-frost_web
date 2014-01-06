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
	$glvId = $_POST["glvId"];
	$glvName = $_POST["glvName"];
	$flagFindLevelIsEmpty=0;
	
	$deletePdfCategory = "
		DELETE FROM `PDF`
		WHERE `ID` IN
			(SELECT `PDF_ID`
			FROM `PDF_CATEGORY`
			WHERE `GROUP_LEVEL_NAME` = '".$glvName."'
			AND `GROUP_LEVEL_ID` = '".$glvId."')
	;";
	@mysql_query($deletePdfCategory);
	
	
	$deleteGroup="
		SELECT * FROM `GROUP_LV".$glvName."` WHERE `GROUP_LV".$glvName."_ID` = {$glvId};
	";
	@mysql_query($deleteGroup);
		
	//header("location: group.php");
	?><script>window.location = "group.php?msg=Success";</script><?php
?>