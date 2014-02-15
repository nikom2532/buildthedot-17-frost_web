<?php
// function main_knowledge_pdflist($temp_glvl_list, $temp_id_list){
	//####### Query List ##########
	// $temp_glvl_list = $_GET["glvl"];
	// $temp_id_list = $_GET["id"];
	
	$c_ID = array();
	$c_glvl = array(); 
	$c_PDF_CATEGORY_ID = array();
	$c_PDF_ID = array();
	$c_NAME = array();
	$c_UPDATE_DATE = array();
	$c_DESCRIPTION = array();
	
  ############## Find Children ####################
	
	//####### Query List ##########
	// $temp_glvl_list = $_GET["glvl"];
	// $temp_id_list = $_GET["id"];
	
	$c_ID = array();
	$c_glvl = array(); 
	$c_PDF_CATEGORY_ID = array();
	$c_PDF_ID = array();
	$c_NAME = array();
	$c_UPDATE_DATE = array();
	$c_DESCRIPTION = array();
	echo	$SQLcontent="
		SELECT *, COUNT(`PDF_ID`) AS num
		FROM  `PDF`
		INNER JOIN `PDF_CATEGORY`  
		WHERE `PDF_CATEGORY`.`GROUP_LEVEL_NAME` = '{$temp_glvl_list}'
		AND `PDF_CATEGORY`.`GROUP_LEVEL_ID` = '{$temp_id_list}'
		AND `PDF_CATEGORY`.`PDF_ID` = `PDF`.`ID`
	;";
	$resultcontent = @mysql_query($SQLcontent);
	while ($rscontent = @mysql_fetch_array($resultcontent)) {
		$c_ID[] = $temp_id_list;
		$c_glvl[] = $temp_glvl_list;
		$c_PDF_CATEGORY_ID[] = $rscontent["ID"];
		$c_NAME[] = $rscontent["NAME"];
		$c_PDF_ID[] = $rscontent["PDF_ID"];
		$c_UPDATE_DATE[] = $rscontent["UPDATE_DATE"];
		$c_DESCRIPTION[] = $rscontent["DESCRIPTION"];
		$c_PHOTO_NAME[] = $rscontent["PHOTO_NAME"];
		echo "(".$rscontent["num"].")";
	}
	
	// echo $SQLcontent;
	// var_dump($c_ID);
// }
?>