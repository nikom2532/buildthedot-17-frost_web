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
	//echo $pdfId;
	//echo "DELETE FROM PDF WHERE ID=$pdfId";
	$deletePdf = mysql_query("DELETE FROM PDF WHERE ID=$pdfId");
	$deletePdfCategory = mysql_query("DELETE FROM PDF_CATEGORY WHERE PDF_ID=$pdfId");
    if($deletePdf){
			//header("location: pdf.php");
			?><script>window.location = "pdf.php";</script><?php
    } else {
    	//header("location: pdf.php");
			?><script>window.location = "pdf.php";</script><?php
    }
?>