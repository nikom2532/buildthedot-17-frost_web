<?php
	include ("include/header.php");
	
	$pdfId = $_POST['pdfId'];
	//echo $pdfId;
	//echo "DELETE FROM PDF WHERE ID=$pdfId";
	$deletePdf = mysql_query("DELETE FROM PDF WHERE ID=$pdfId");
	$deletePdfCategory = mysql_query("DELETE FROM PDF_CATEGORY WHERE PDF_ID=$pdfId");
    if($deletePdf){
        header("location: pdf.php");
    } else {
    	header("location: pdf.php");
		
    }
?>