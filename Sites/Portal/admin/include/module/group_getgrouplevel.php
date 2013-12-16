<?php
$glvl_id=array();
$glvl_name=array();
$glvl_description=array();
$glvl_glvl=array();
$glvl_glvl_parent=array();
$sql_glvl="
	SELECT * 
	FROM  `GROUP_LV1` 
";
$result_glvl=@mysql_query($sql_glvl);
while ($rs_glvl=@mysql_fetch_array($sql_glvl)) {
	$glvl_id[]=$rs_glvl["ID"];
	$glvl_name[]=$rs_glvl["NAME"];
	$glvl_description[]=$rs_glvl["DESCRIPTION"];
	$glvl_glvl[]=1;
	$glvl_glvl_parent[]="";
}
for($i=2; $i<6; $i++){
	$sql_glvl="
		SELECT * 
		FROM  `GROUP_LV{$i}` 
	";
	$result_glvl=@mysql_query($sql_glvl);
	while ($rs_glvl=@mysql_fetch_array($sql_glvl)) {
		$glvl_id[]=$rs_glvl["ID"];
		$glvl_name[]=$rs_glvl["NAME"];
		$glvl_description[]=$rs_glvl["DESCRIPTION"];
		$glvl_glvl[]=$i;
		$glvl_glvl_parent[]=$rs_glvl["GROUP_LV".($i-1)."_ID"];
	}
}
?>