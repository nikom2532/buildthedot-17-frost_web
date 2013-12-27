<?php
include ("include/header.php");
@session_start();
$rootpath = "../";
$rootadminpath = "./";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
include ("include/checksession.php");
$sql="
	SELECT t.ID AS value, t.NAME AS label
	FROM TAG t 
";
$result = mysql_query($sql);

$numRow = mysql_num_rows($result);
if(mysql_num_rows($result)){
	$tagResult =  '[';
	//$tagResult_id =  '[';
	$counter = 0;
	while ($row = mysql_fetch_array($result)) {
		if (++$counter == $numRow) {
			$tagResult .= "'".$row['label']."'";//.":".$row['id']
			//$tagResult_id .= "'".$row['value']."'";//.":".$row['id']
		} 
		else {
			$tagResult .= "'".$row['label']."'".",";	//.":".$row['id']
			//$tagResult_id .= "'".$row['value']."'".",";	//.":".$row['id']
    	}
	}
	$tagResult .= ']';
	//$tagResult_id .= ']';
	//echo $tagResult;
}

$rows = array();
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result)) {
	$rows[] = $row;
}
$tagResult = json_encode($rows);

$rows = array();
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result)) {
	$rows[] = $row;
}
$tagResult_id = json_encode($rows);

$pdfId = $_POST['pdfId'];
$glvId = $_POST['glvId'];
$glvName = $_POST['glvName'];

$gLv1Id = $_POST["gLv1Id"];
$gLv2Id = $_POST["gLv2Id"];
$gLv3Id = $_POST["gLv3Id"];

include ("include/top-bar.php");
?>
<!-- HEADER -->
<div id="header-with-tabs">
	<div class="page-full-width cf">
		<ul id="tabs" class="left">
			<li>
				<a href="main.php" class="dashboard-tab">Dashboard</a>
			</li>
			<li>
				<a href="customer.php">Customer Management</a>
			</li>
			<li>
				<a href="pdf.php" class="active-tab">PDF Management</a>
			</li>
			<li>
				<a href="tag.php">Tag Management</a>
			</li>
			<li>
				<a href="home-info.php">Home Info</a>
			</li>
		</ul>
		<!-- end tabs -->

		<!-- company logo -->
		<a href="#" id="company-branding-small" class="right"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>

	</div>
	<!-- end full-width -->

</div>
<!-- end header -->

<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">
		<div class="content-module">

			<div class="content-module-heading cf">

				<h3 class="fl">Edit PDF</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main cf">
<?php
				include ("include/side-menu-knowledge.php");
				$lv1 = $gLv1Id;
				$lv2 = $gLv2Id;
				$lv3 = $gLv3Id;
				$lv4 = $parentGroup5;
				
				$gLv4Id = $lv4;
				$gLv3Id = $lv3;
				$gLv2Id = $lv2;
				$gLv1Id = $lv1;
?>
				<form action="edit-pdf-glvl5.php" method='POST' name="editpdf" id="editpdf">
					<input type="hidden" name="pdfId" value="<?php echo $pdfId; ?>" />
					<input type="hidden" name="glvId" value="<?php echo $glvId; ?>" />
					<input type="hidden" name="glvName" value="<?php echo $glvName; ?>" />
					<input type="hidden" name="gLv1Id" value="<?php echo $gLv1Id; ?>" />
					<input type="hidden" name="gLv2Id" value="<?php echo $gLv2Id; ?>" />
					<input type="hidden" name="gLv3Id" value="<?php echo $gLv3Id; ?>" />

					<div class="half-size-column fl">
							<p class="form-error-input">
								<div id="gLv4Div">
									<label for="gLv4Id">Group level 4</label>
<?php
									$sqlLv4 = "SELECT * FROM GROUP_LV4 WHERE `GROUP_LV3_ID` = '{$gLv3Id}';";
									$resultLv4 = mysql_query($sqlLv4);
?>
									<select name="gLv4Id" id="gLv4Id" >
										
										<option value='0'>--Select Menu--</option>
<?php 
										while ($rowLv4 = mysql_fetch_array($resultLv4)) {
?>
											<option value="<?php echo $rowLv4['ID']; ?>" <?php
												$sqlLv4_selected = "SELECT * FROM GROUP_LV4 WHERE `ID` = '{$gLv4Id}'";
												$resultLv4_selected = mysql_query($sqlLv4_selected);
												while ($rs_Lv4_selected = @mysql_fetch_array($resultLv4_selected)) {
													if($rowLv4['ID'] == $rs_Lv4_selected['ID']){
														echo "selected='selected' ";
													}
												}
												?>><?php echo $rowLv4['NAME']; ?>
											</option>
<?php
										}
?>
									</select>
									<input type="submit" value="Choose" />
								</div>
							</p>
					</div>
					<!-- end half-size-column -->

					
				</form>
			<!-- end half-size-column -->

		</div>
		<!-- end content-module-main -->

	</div>
	<!-- end content-module -->

</div>
<!-- end full-width -->

</div> <!-- end content -->
<?php
include($rootadminpath."js/module/upload-pdf-edit.php");
?><script type="text/javascript">
	//getDefaultData();
</script><?php
	include ("include/footer.php");
?>
