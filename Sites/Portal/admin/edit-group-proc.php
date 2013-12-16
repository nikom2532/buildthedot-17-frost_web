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

$glvl_glvl = $_POST["glvl_glvl"];
$glvl_id = $_POST["glvl_id"];
$name = $_POST["NAME"];
$description = $_POST["description"];
$glvl_id_parent = $_POST["glvl_id_parent"];

// echo "userID=>".$userID ."<br/>";
// echo "name=>".$name ."<br/>";
// echo "email=>".$email ."<br/>";

if($glvl_glvl>1){
	echo $strSQLUpdateGroup = "
		UPDATE `GROUP_LV".$glvl_glvl."` 
		SET
			`NAME` ='{$name}',
			`DESCRIPTION` = '{$description}',
			`GROUP_LV".($glvl_glvl-1)."_ID` = '{$glvl_id_parent}'
		WHERE ID = '{$glvl_id}'
	;";
}
else{
	$strSQLUpdateGroup = "
		UPDATE `GROUP_LV".$glvl_glvl."` 
		SET
			`NAME` ='{$name}',
			`DESCRIPTION` = '{$description}',
		WHERE ID = '{$glvl_id}'
	;";
}

//echo "strQuery=>".$strSQLUpdateInfo ;
$cmdQuery = mysql_query($strSQLUpdateGroup);
if(mysql_affected_rows()){
	$msg = "Sucess";
	//header("location: home-info.php?msg=$msg");
	?><script>window.location = "group.php?msg=<?php echo $msg; ?>";</script><?php
}else{
	$msg = "Failed";
	//header("location: home-info.php?msg=$msg");
	?><script>window.location = "group.php?msg=<?php echo $msg; ?>";</script><?php
}
