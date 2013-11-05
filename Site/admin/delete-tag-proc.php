<?php include("include/header.php");?>
<?php
$tagId = $_POST['tagId'];

$strSQL="DELETE FROM TAG WHERE ID='$tagId'";
$cmdQuery=mysql_query($strSQL);
echo $strSQL;
if($cmdQuery){
	$msg = "Sucess";
	echo $msg;
	header("location: tag.php?msg=$msg");
}else{
	$msg = "Failed";
	echo $msg;
	header("location: tag.php?msg=$msg");
	
}
?>