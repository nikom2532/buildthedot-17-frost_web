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

				<form action="edit-pdf-proc.php" method='POST' name="editpdf" id="editpdf">
					<div class="half-size-column fl">

							<p class="form-error-input">

								<div id="gLv1Div">
									<label for="gLv1">Group level 1</label>
<?php
									$sqlLv1 = "SELECT * FROM GROUP_LV1";
									$resultLv1 = mysql_query($sqlLv1);
?>
									<select name="gLv1" id="gLv1" onchange="getGLv2(this.value)">
										
										<option value='0'>--Select Menu--</option>
<?php 
										while ($rowLv1 = mysql_fetch_array($resultLv1)) {
?>
											<option value="<?php echo $rowLv1['ID']; ?>" <?php 
												$sqlLv1_selected = "SELECT * FROM GROUP_LV1 WHERE `ID` = '{$gLv1Id}'";
												$resultLv1_selected = mysql_query($sqlLv1_selected);
												while ($rs_Lv1_selected = @mysql_fetch_array($resultLv1_selected)) {
													if($rowLv1['ID'] == $rs_Lv1_selected['ID']){
														echo "selected='selected' ";
													}
												}
												?>><?php echo $rowLv1['NAME']; ?>
											</option>
<?php
										}
?>
									</select>
									<form name="edit_glv1" id="edit_glv1" action="edit-pdf-glvl1.php" method="POST">
										
									</form>
								</div>
							
								<div id="gLv2Div">
<?php
									$sqlLv_select="SELECT * FROM GROUP_LV2 WHERE `ID` = '{$gLv2Id}'";
									$resultLv_selected = @mysql_query($sqlLv_select);
									if(@mysql_fetch_array($resultLv_selected)){
?>
										<label for="gLv3">Group level 2</label>
<?php
										$sqlLv2 = "SELECT * FROM GROUP_LV2";
										$resultLv2 = mysql_query($sqlLv2);
?>
										<select name="gLv2" id="gLv2" onchange="getGLv3(this.value)">
											
											<option value='0'>--Select Menu--</option>
<?php 
											while ($rowLv2 = mysql_fetch_array($resultLv2)) {
?>
												<option value="<?php echo $rowLv2['ID']; ?>" <?php 
													$sqlLv2_selected = "SELECT * FROM GROUP_LV2 WHERE `ID` = '{$gLv2Id}'";
													$resultLv2_selected = mysql_query($sqlLv2_selected);
													while ($rs_Lv2_selected = @mysql_fetch_array($resultLv2_selected)) {
														if($rowLv2['ID'] == $rs_Lv2_selected['ID']){
															echo "selected='selected' ";
														}
													}
													?>><?php echo $rowLv2['NAME']; ?>
												</option>
<?php
											}
?>
										</select>
<?php
									}
?>
								</div>
								<div id="gLv3Div">
<?php
									$sqlLv_select="SELECT * FROM GROUP_LV3 WHERE `ID` = '{$gLv3Id}'";
									$resultLv_selected = @mysql_query($sqlLv_select);
									if(@mysql_fetch_array($resultLv_selected)){
?>
										<label for="gLv3">Group level 3</label>
	<?php
										$sqlLv3 = "SELECT * FROM GROUP_LV3";
										$resultLv3 = mysql_query($sqlLv3);
	?>
										<select name="gLv3" id="gLv3" onchange="getGLv4(this.value)">
											
											<option value='0'>--Select Menu--</option>
	<?php 
											while ($rowLv3 = mysql_fetch_array($resultLv3)) {
	?>
												<option value="<?php echo $rowLv3['ID']; ?>" <?php 
													$sqlLv3_selected = "SELECT * FROM GROUP_LV3 WHERE `ID` = '{$gLv3Id}'";
													$resultLv3_selected = mysql_query($sqlLv3_selected);
													while ($rs_Lv3_selected = @mysql_fetch_array($resultLv3_selected)) {
														if($rowLv3['ID'] == $rs_Lv3_selected['ID']){
															echo "selected='selected' ";
														}
													}
													?>><?php echo $rowLv3['NAME']; ?>
												</option>
	<?php
											}
	?>
										</select>
	<?php
									}
?>
								</div>

								<div id="gLv4Div">
<?php
									$sqlLv_select="SELECT * FROM GROUP_LV4 WHERE `ID` = '{$gLv4Id}'";
									$resultLv_selected = @mysql_query($sqlLv_select);
									if(@mysql_fetch_array($resultLv_selected)){
?>
										<label for="gLv4">Group level 4</label>
<?php
										$sqlLv4 = "SELECT * FROM GROUP_LV4";
										$resultLv4 = mysql_query($sqlLv4);
?>
	
										<select name="gLv4" id="gLv4" onchange="getGLv5(this.value)">
											
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
	<?php
									}
?>
								</div>

								<div id="gLv5Div">
<?php
									$sqlLv_select="SELECT * FROM GROUP_LV5 WHERE `ID` = '{$gLv5Id}'";
									$resultLv_selected = @mysql_query($sqlLv_select);
									if(@mysql_fetch_array($resultLv_selected)){
?>
										<label for="gLv5">Group level 5</label>
	<?php
										$sqlLv5 = "SELECT * FROM GROUP_LV5";
										$resultLv5 = mysql_query($sqlLv5);
	?>
	
										<select name="gLv5" id="gLv5" onchange="getGLv6(this.value)">
											
											<option value='0'>--Select Menu--</option>
	<?php 
											while ($rowLv5 = mysql_fetch_array($resultLv5)) {
	?>
												<option value="<?php echo $rowLv5['ID']; ?>" <?php 
													$sqlLv5_selected = "SELECT * FROM GROUP_LV5 WHERE `ID` = '{$gLv5Id}'";
													$resultLv5_selected = mysql_query($sqlLv5_selected);
													while ($rs_Lv5_selected = @mysql_fetch_array($resultLv5_selected)) {
														if($rowLv5['ID'] == $rs_Lv5_selected['ID']){
															echo "selected='selected' ";
														}
													}
													?>><?php echo $rowLv5['NAME']; ?>
												</option>
	<?php
											}
	?>
										</select>
<?php
									}
?>
								</div>
							</p>
							
						</fieldset>
						
						<!-- </form> -->

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
