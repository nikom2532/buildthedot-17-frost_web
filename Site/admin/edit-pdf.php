<?php
include ("include/header.php");
include ("include/checksession.php");
$sql="
	SELECT t.ID AS value, t.NAME AS label
	FROM TAG t 
";
$result = mysql_query($sql);

$numRow = mysql_num_rows($result);
if(mysql_num_rows($result)){
	$tagResult =  '[';
	$counter = 0;
	while ($row = mysql_fetch_array($result)) {
		if (++$counter == $numRow) {
			$tagResult .= "'".$row['label']."'";//.":".$row['id']
		} 
		else {
			$tagResult .= "'".$row['label']."'".",";	//.":".$row['id']
    }
	}
	$tagResult .= ']';
	//echo $tagResult;
}

$rows = array();
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result)) {
	$rows[] = $row;
}
$tagResult = json_encode($rows);

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

						<!-- <form action="edit-pdf-proc.php" method='POST' name="editpdf" id="editpdf"> -->
<?php
						echo "pdfId = ".$_POST["pdfId"]."<Br />glvId = ".$_POST["glvId"]."<Br />glvName = ".$_POST["glvName"]."<Br /></br />";
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
								<input type="text" id="name" class="round full-width-input" value="<?=$row['name']; ?>"/>
							</p>

							<p>
								<label for="description">Description</label>
								<textarea id="description" class="round full-width-textarea" ><?=$row['description']; ?></textarea>
							</p>

							<p>
								<label for="price">Price</label>
								<input type="text" id="price" class="round full-width-input" value="<?=$row['price']; ?>"/>
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
							// $resultPdf = mysql_query("
										// SELECT *
										// FROM PDF_CATEGORY
										// WHERE PDF_ID = $pdfId						
									   // ");
							// while ($rowPdf = mysql_fetch_array($resultPdf)) {
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
								 echo "lv4  = $lv4"."<br>";
								 echo "lv3  = $lv3"."<br>";
								 echo "lv2  = $lv2"."<br>";
								 echo "lv1  = $lv1"."<br>";
								 
								 $gLv4Id = $lv4;
								 $gLv3Id = $lv3;
								 $gLv2Id = $lv2;
								 $gLv1Id = $lv1;
								 
								 echo "$gLv1Id";
								 echo "$gLv2Id";
								 echo "$gLv3Id";
							}
							
						
						?>
						<input type=hidden id="gLv1Id" name="gLv1Id" value="<?php echo $gLv1Id; ?>"/>
						<input type=hidden id="gLv2Id" name="gLv2Id" value="<?php echo $gLv2Id; ?>"/>
						<input type=hidden id="gLv3Id" name="gLv3Id" value="<?php echo $gLv3Id; ?>"/>
						<input type=hidden id="gLv4Id" name="gLv4Id" value="<?php echo $gLv4Id; ?>"/>
						<input type=hidden id="pdfId" name="pdfId" value="<?php echo $pdfId; ?>"/>
						
						<script type="text/javascript">
							getDefaultData();
						</script>
							<p class="form-error-input">

								<div id="gLv1Div">
									<label for="group-name">Group level 1</label>

									<?php
									$sqlLv1 = "SELECT * FROM GROUP_LV1";
									$resultLv1 = mysql_query($sqlLv1);
									?>

									<select name="group-name" id="group-name" onchange="getGLv2(this.value)">
										
										<option value='0'>--Select Menu--</option>
										<?php 
										while ($rowLv1 = mysql_fetch_array($resultLv1)) {
										?>
											<option value="<?=$rowLv1['ID']?>" <?php if($lv1 == $rowLv1['ID']){ echo "selected='selected' "; } ?>><?=$rowLv1['NAME']?></option>
										<?php 
										}
										?>
									</select>
								</div>
							
								<div id="gLv2Div">

								</div>

								<div id="gLv3Div">

								</div>

								<div id="gLv4Div">

								</div>

								<div id="gLv5Div">

								</div>
							</p>
							
						</fieldset>
						
						<!-- </form> -->

					</div>
					<!-- end half-size-column -->

					<div class="half-size-column fr">
						<fieldset>
<?php 
							$str_sql = "
								SELECT t.ID AS id, t.NAME AS name
								FROM TAG AS t
								INNER JOIN TAG_RELATIONSHIP AS tr 
								ON tr.TAG_ID = t.ID
								WHERE tr.PDF_ID = $pdfId
							";
							$resultTag = @mysql_query($str_sql);
							while($rsTag = @mysql_fetch_array($resultTag)){
								$Tag_result[] = $rsTag["name"]; 
							}
							// print_r($Tag_result);
?>
							<p class="form-error-input">
								<p class="form-error-input">
              		<p><label for="tag">Tag</label></p>
									<input type="text" id="text" name="tags" value="<?php 
										for($i=0; $i<count($Tag_result); $i++){
											echo $Tag_result[$i];
											if($i<count($Tag_result)-1){
												echo ",";
											}
										}
									?>" />		
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
						<input type="submit" value="Save change" class="round blue ic-right-arrow" />

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
	include ("include/footer.php");
?>