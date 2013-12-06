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
/*
//Old version
$sql="
	SELECT t.ID AS value, t.NAME AS label
	FROM TAG t 
";
*/
$sql="
	SELECT t.NAME AS value, t.NAME AS label
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
//print_r($tagResult);

//----------------------
$pdfId = $_POST['pdfId'];
$glvId = $_POST['glvId'];
$glvName = $_POST['glvName'];

//----------------------

//$sql_tagResult_db = "
//	SELECT t.ID AS value, t.NAME AS label
//	FROM TAG AS t
//	INNER JOIN TAG_RELATIONSHIP AS tr 
//	ON tr.TAG_ID = t.ID
//	WHERE tr.PDF_ID = $pdfId
//";
$sql_tagResult_db = "
	SELECT t.NAME AS value, t.NAME AS label
	FROM TAG AS t
	INNER JOIN TAG_RELATIONSHIP AS tr 
	ON tr.TAG_ID = t.ID
	WHERE tr.PDF_ID = $pdfId
";
$tagResults_db = array();
$result_tagResult_db = @mysql_query($sql_tagResult_db);
while($row_tagResult_db = @mysql_fetch_assoc($result_tagResult_db)){
	$tagResults_db[] = $row_tagResult_db;
	$tagResults_db_value[] = $row_tagResult_db["value"];
	$tagResults_db_label[] = $row_tagResult_db["label"];
}
$tagResult_db = json_encode($tagResults_db);
print_r($tagResult_db);
//----------------------



//----------------------

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
<?php
						include ("include/side-menu-knowledge.php");
?>
						<!-- <form action="edit-pdf-proc.php" method='POST' name="editpdf" id="editpdf"> -->
<?php
						//echo "pdfId = ".$_POST["pdfId"]."<Br />glvId = ".$_POST["glvId"]."<Br />glvName = ".$_POST["glvName"]."<Br /></br />";
						$sql="
							SELECT p.ID AS id,
							p.NAME AS name,
							p.DESCRIPTION AS description,
							p.PHOTO_NAME AS photoname,
							p.PATH AS path,
							p.PRICE AS price,
							p.UPDATE_DATE AS updateDate,
							c.GROUP_LEVEL_NAME as glvl,
							c.GROUP_LEVEL_ID as glvId
							FROM PDF AS p
							INNER JOIN PDF_CATEGORY AS c
							ON c.PDF_ID = p.ID
							WHERE p.ID = $pdfId 
							AND p.IS_ASIAN_COUNTRY = '0' 
							AND c.GROUP_LEVEL_NAME = $glvName 
							AND c.GROUP_LEVEL_ID = $glvId;
						";
						$result = mysql_query($sql);

						while ($row = mysql_fetch_array($result)) {
?>
						<fieldset>
							<p>
								<label for="title">Title</label>
								<input type="text" name="name" id="name" class="round full-width-input" value="<?=$row['name']; ?>"/>
							</p>
							<p>
								<label for="description">Description</label>
								<textarea name="description" id="description" class="round full-width-textarea" ><?=$row['description']; ?></textarea>
							</p>
							<p>
								<label for="price">Price</label>
								<input type="text" name="price" id="price" class="round full-width-input" value="<?=$row['price']; ?>"/>
							</p>
							<p>
								<label for="asian">Asian country</label>
								<input type="radio" name="asian" id="asian" value="0" checked>
								No
								<br>
								<input type="radio" name="asian" id="asian" value="1">
								Yes
								<br>
							</p>
<?php
							$lv1 = $parentGroup2;
							$lv2 = $parentGroup3;
							$lv3 = $parentGroup4;
							$lv4 = $parentGroup5;
							
							$gLv4Id = $lv4;
							$gLv3Id = $lv3;
							$gLv2Id = $lv2;
							$gLv1Id = $lv1;
							
							//if($_POST["state_change"]==1){
							//	$gLv1Id = $_POST["gLv1Id"];
							//	$gLv2Id = $_POST["gLv2Id"];
							//	$gLv3Id = $_POST["gLv3Id"];
							//	$gLv4Id = $_POST["gLv4Id"];
							//	$lv1 = $gLv1Id;
							//	$lv2 = $gLv2Id;
							//	$lv3 = $gLv3Id;
							//	$lv4 = $gLv4Id;
							//}
/*
							$resultPdf = mysql_query("
										SELECT *
										FROM PDF_CATEGORY
										WHERE PDF_ID = $pdfId						
									   ");
							while ($rowPdf = mysql_fetch_array($resultPdf)) {
								$lvName = $row['glvl'];
								$lvId = $row['glvId'];
								echo "Group Lv name>".$lvName;
								echo "Group Lv id>".$lvId;
								$lv1 = 0;
								$lv2 = 0;
								$lv3 = 0;
								$lv4 = 0;
								
								if($lvName == 2){
									switch ($lvId) {
									// lv1 = 1
									case 1:	
										$lv1 = 1;	
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									case 2:
										$lv1 = 1;
										$lv2 = $lvId;
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 3:
										$lv1 = 1;
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									case 10:
										$lv1 = 1;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									// lv1 = 2
									case 4:	
										$lv1 = 2;
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									case 5:
										$lv1 = 2;
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									case 6:
										$lv1 = 2;
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									case 7:
										$lv1 = 2;
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									case 8:
										$lv1 = 2;
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									case 9:
										$lv1 = 2;
										$lv2 = $lvId;
									    //echo "lv1  = $lv1"."<br>";
									    break;
									}
								}// end group level name = 2
								
								if($lvName == 3){
									switch ($lvId) {
									// lv2 = 3
									case 3:	
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;	
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 4:
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 5:
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 6:
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;		
									case 7:	
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 8:
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									// lv2 = 2
									case 9:
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 10:
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 11:
										$lv3 = $lvId;
										$lv2 = 2;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									case 12:
										$lv3 = $lvId;
										$lv2 = 4;
										$lv1 = 1;
									    // echo "lv2  = $lv2"."<br>";
									    // echo "lv1  = $lv1"."<br>";
									    break;
									}
								}// end group level name = 3
								
								if($lvName == 4){
									switch ($lvId) {
									// lv2 = 3
									case 5:
										$lv4 = $lvId;
										$lv3 = 10;
										$lv2 = 3;
										$lv1 = 1;		
									    // echo "lv3  = $lv3"."<br>";
									    // echo "lv2  = $lv2"."<br>";
										// echo "lv1  = $lv1"."<br>";
									    break;
									case 6:
										$lv4 = $lvId;
										$lv3 = 10;
										$lv2 = 3;
										$lv1 = 1;
									    // echo "lv3  = $lv3"."<br>";
									    // echo "lv2  = $lv2"."<br>";
										// echo "lv1  = $lv1"."<br>";
									    break;
									case 7:
										$lv4 = $lvId;
										$lv3 = 11;
										$lv2 = 3;
										$lv1 = 1;
									    // echo "lv3  = $lv3"."<br>";
									    // echo "lv2  = $lv2"."<br>";
										// echo "lv1  = $lv1"."<br>";
									    break;
									case 8:
										$lv4 = $lvId;
										$lv3 = 12;
										$lv2 = 4;
										$lv1 = 2;
									    // echo "lv3  = $lv3"."<br>";
									    // echo "lv2  = $lv2"."<br>";
										// echo "lv1  = $lv1"."<br>";
									    break;
									
									}
								}// end group level name = 4
								 echo "lv4  = $lv4"."<br/>";
								 echo "lv3  = $lv3"."<br/>";
								 echo "lv2  = $lv2"."<br/>";
								 echo "lv1  = $lv1"."<br/>";
								 
								 $gLv4Id = $lv4;
								 $gLv3Id = $lv3;
								 $gLv2Id = $lv2;
								 $gLv1Id = $lv1;
								 
								 echo "$gLv1Id";
								 echo "$gLv2Id";
								 echo "$gLv3Id";
							}
*/
						}
							
						/* ?>
						<input type=hidden id="gLv1Id" name="gLv1Id" value="<?php echo $gLv1Id; ?>"/>
						<input type=hidden id="gLv2Id" name="gLv2Id" value="<?php echo $gLv2Id; ?>"/>
						<input type=hidden id="gLv3Id" name="gLv3Id" value="<?php echo $gLv3Id; ?>"/>
						<input type=hidden id="gLv4Id" name="gLv4Id" value="<?php echo $gLv4Id; ?>"/>
						<input type=hidden id="pdfId" name="pdfId" value="<?php echo $pdfId; ?>"/>
						*/ 
?>
						<input type=hidden id="gLv1Id" name="gLv1Id" value="<?php echo $parentGroup2; ?>"/>
						<input type=hidden id="gLv2Id" name="gLv2Id" value="<?php echo $parentGroup3; ?>"/>
						<input type=hidden id="gLv3Id" name="gLv3Id" value="<?php echo $parentGroup4; ?>"/>
						<input type=hidden id="gLv4Id" name="gLv4Id" value="<?php echo $parentGroup5; ?>"/>
						<input type=hidden id="pdfId" name="pdfId" value="<?php echo $pdfId; ?>"/>
							<p class="form-error-input">

								<div id="gLv1Div">
									<label for="gLv1">Group level 1</label>
<?php
									$sqlLv1 = "SELECT * FROM GROUP_LV1";
									$resultLv1 = mysql_query($sqlLv1);
?>
									<select name="gLv1" id="gLv1" onchange="getGLv2(this.value)" disabled="disabled">
										
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
										<select name="gLv2" id="gLv2" onchange="getGLv3(this.value)" disabled="disabled">
											
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
										<select name="gLv3" id="gLv3" onchange="getGLv4(this.value)" disabled="disabled">
											
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
	
										<select name="gLv4" id="gLv4" onchange="getGLv5(this.value)" disabled="disabled">
											
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
	
										<select name="gLv5" id="gLv5" onchange="getGLv6(this.value)" disabled="disabled">
											
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
								</div><br />
								<a href="edit-pdf-glvl1.php?pdfId=<?php echo $pdfId; ?>&glvId=<?php echo $glvId; ?>&glvName=<?php echo $glvName; ?>&gLv1Id=<?php echo $gLv1Id; ?>">Change Group Level</a>
							</p>
							
						</fieldset>
						
						<!-- </form> -->

					</div>
					<!-- end half-size-column -->

					<div class="half-size-column fr">
						<fieldset>
<?php 
							 //print_r($Tag_result);
							 print_r($tagResult);
?>
							<p class="form-error-input">
								<p class="form-error-input">
              		<p><label for="tag">Tag</label></p>
									<input type="text" id="tags" name="tags" value="<?php
										for($i=0; $i<count($tagResults_db_value); $i++){
											echo $tagResults_db_value[$i];
											if($i<count($tagResults_db_value)-1){
												echo ",";
											}
										}
										
									?>" />
									
									<input type="hidden" id="tags_val" name="tags_val" value="" />
									<div id="tagName"></div>
									<input type="button" id="submitTags" name="submitTags" value="asdff" />
									<br/>
                </p>
							</p>
							<p class="form-error-input">
                <label for="uploadfile">Upload Image</label>
                <input type="file" name="imageUpload"/><?=$row['photoname'];?>
        	    </p>
              <p class="form-error-input">
                <label for="uploadfile">Upload File</label>
                <input type="file" name="pdfUpload"/><?=$row['path'];?>
          	  </p>
						</fieldset>
						<input type="submit" id="tags_val" name="tags_val" value="Save change" class="round blue ic-right-arrow" />
					</div>
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
?><script>
	//getDefaultData();
<?php
/*
	for($i=0; $i<count($tagResults_db_label); $i++){
?>
		//$("p.form-error-input").html("<?php echo $tagResults_db_label[$i]; ?>");
		$("ul.tags.tagit li.tagit-choice:nth-child(<?php echo ($i+1); ?>)").html("<?php echo $tagResults_db_label[$i]; ?>");
		//$("ul.tags.tagit li").html("asdfasdfasddff<?php echo $tagResults_db_label[$i]; ?>");
<?php
	}
*/
?></script><?php
	include ("include/footer.php");
?>
