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
	
	//Fine Group level Child is Empty?
	$SQLFindLevelIsEmpty = "
		SELECT * FROM `GROUP_LV".($glvName+1)."` WHERE `GROUP_LV".$glvName."_ID` = {$glvId};
	";
	$result_FindLevelIsEmpty=@mysql_query($SQLFindLevelIsEmpty);
	while ($rsFindPath=@mysql_fetch_array($result_FindLevelIsEmpty)) {
		$flagFindLevelIsEmpty++;
	}
	if ($flagFindLevelIsEmpty>0) {
		?><script>window.location = "group.php?grouplevel=<?php echo $glvName; ?>&msg=dum";</script><?php
	}
	else{
		$findPdfCategory = "
			SELECT * 
			FROM `PDF`
			WHERE `ID` IN
				(SELECT `PDF_ID`
				FROM `PDF_CATEGORY` 
				WHERE `GROUP_LEVEL_NAME` = '".$glvName."'
				AND `GROUP_LEVEL_ID` = '".$glvId."')
		;";
		$result_findPdfCategory = @mysql_query($findPdfCategory);
		while ($rs_findPdfCategory = @mysql_fetch_array($result_findPdfCategory)) {
			$ID_array[] = $rs_findPdfCategory["ID"];
			$NAME_array[] = $rs_findPdfCategory["NAME"];
		}
		
		?>There are <br /><br /><?php
		for($i=0; $i<count($ID_array); $i++){
			if($i % 2 == 0){
				echo "<div style=\"background:#129793;\">";
			}
			else {
				echo "<div style=\"background:#EB500B;\">";
			}
			echo $NAME_array[$i]."</div>";
		}
		?><br />That already join with this group<br />Do you want to delete? <br />
		<a href="./delete-group2.php?glvId=<?php echo $glvId;?>&glvName=<?php echo $glvName; ?>">Yes</a><br /><a href="./group.php">No</a><?php
	}
	/*
	$deletePdf = mysql_query("DELETE FROM PDF WHERE ID=$pdfId");
    if($deletePdf){
			//header("location: pdf.php");
			?><script>window.location = "group.php";</script><?php
    } else {
    	//header("location: pdf.php");
			?><script>window.location = "group.php";</script><?php
    }
?>