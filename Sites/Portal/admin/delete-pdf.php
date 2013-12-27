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
	$pdfId = $_POST['pdfId'];
	
	//delete files function
	$SQLFindPath="
		SELECT * FROM PDF WHERE ID={$pdfId};
	";
	$result_FindPath=@mysql_query($SQLFindPath);
	while ($rsFindPath=@mysql_fetch_array($result_FindPath)) {
		unlink($rootpath."images/pdf_image/".$rsFindPath["PHOTO_NAME"]);
		unlink($rootpath."pdf/".$rsFindPath["PATH"]);
	}
	$deleteTag = mysql_query("DELETE FROM TAG_RELATIONSHIP WHERE PDF_ID=$pdfId");
	$deletePdfCategory = mysql_query("DELETE FROM PDF_CATEGORY WHERE PDF_ID=$pdfId");
	$deletePdf = mysql_query("DELETE FROM PDF WHERE ID=$pdfId");
    if($deletePdf){
			//header("location: pdf.php");
			?><script>window.location = "pdf.php";</script><?php
    } else {
    	//header("location: pdf.php");
			?><script>window.location = "pdf.php";</script><?php
    }
?>