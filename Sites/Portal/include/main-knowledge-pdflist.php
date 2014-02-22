<?php
// function main_knowledge_pdflist($temp_glvl_list, $temp_id_list){
	//####### Query List ##########
	// $temp_glvl_list = $_GET["glvl"];
	// $temp_id_list = $_GET["id"];
	
  ############## Find Children ####################
	
	//####### Query List ##########
	$totalnum = 0;
	$SQLcontent="
		SELECT COUNT(`PDF_ID`) AS num
		FROM  `PDF`
		INNER JOIN `PDF_CATEGORY`  
		WHERE `PDF_CATEGORY`.`GROUP_LEVEL_NAME` = '{$temp_glvl_list}'
		AND `PDF_CATEGORY`.`GROUP_LEVEL_ID` = '{$temp_id_list}'
		AND `PDF_CATEGORY`.`PDF_ID` = `PDF`.`ID`
	;";
	$resultcontent = @mysql_query($SQLcontent);
	while ($rscontent = @mysql_fetch_array($resultcontent)) {
		$totalnum += $rscontent["num"];
		echo "(".$rscontent["num"].")";
	}
	
	// echo $SQLcontent;
	// var_dump($c_ID);
// }
	
	$temp2_glvl_list = $temp_glvl_list;
	$temp2_id_list = $temp_id_list;
	
	// if($temp2_glvl_list == 2){
		
	$SQLgroupNum = "
		SELECT *
		FROM  `GROUP_LV".($temp2_glvl_list+1)."`
		WHERE `ID` = '{$temp2_id_list}' ; 
	";
	$resultGroupNum = @mysql_query($SQLgroupNum);
	while($rsGroupNum = @mysql_fetch_array($resultGroupNum) ){
			echo $rsGroupNum["ID"];
	}
	
	// }
	
?>