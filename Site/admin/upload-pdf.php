<?php 
$rootpath="../";
$rootadminpath="./";
include ("include/header.php");
@session_start();
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
include($rootadminpath."include/checksession.php");

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
echo $tagResult;
include($rootadminpath."js/module/upload-pdf.php");
include("include/top-bar.php");
?>	
<!-- HEADER -->
<div id="header-with-tabs">
	<div class="page-full-width cf">
		<ul id="tabs" class="left">
			<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
			<li><a href="customer.php">Customer Management</a></li>
			<li><a href="pdf.php" class="active-tab">PDF Management</a></li>
      <li><a href="tag.php">Tag Management</a></li>
      <li><a href="home-info.php">Home Info</a></li>
		</ul> <!-- end tabs -->
		<!-- company logo -->
		<a href="#" id="company-branding-small" class="right"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>
	</div> <!-- end full-width -->	
</div> <!-- end header -->
<!-- MAIN CONTENT -->
<div id="content">
	<div class="page-full-width cf">
		<div class="content-module">
			<div class="content-module-heading cf">
				<h3 class="fl">Upload PDF</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>
			</div> <!-- end content-module-heading -->
				<form action="<?php $rootadminpath ?>upload-pdf-proc.php" method='POST' name="editpdf" id="editpdf" enctype="multipart/form-data">
					<div class="content-module-main cf">
						<div class="half-size-column fl">
							<fieldset>
								<p>
									<label for="title">Title</label>
									<input type="text" id="name" name="name" class="round full-width-input" />
								</p>
								
								<p>
									<label for="description">Description</label>
									<textarea id="description" name="description" class="round full-width-textarea"></textarea>
								</p>
								<p>
									<label for="price">Price</label>
									<input type="text" id="price" name="price" class="round full-width-input" />
                  <em>Price in Thai Baht</em>								
								</p>
								<p>
									<label for="asian">Asian country</label>
									<input type="radio" name="asian" id="asian" value="0" checked> No<br>
									<input type="radio" name="asian" id="asian" value="1"> Yes<br>							
								</p>
								<p class="form-error-input">
									<div id="gLv1Div">
										<label for="gLv1">Group level 1</label>
<?php
										$sqlLv1 = "SELECT * FROM GROUP_LV1";
										$resultLv1 = mysql_query($sqlLv1);
?>
										<select name="gLv1" id="gLv1" onchange="getGLv2(this.value)">
<?php
											echo "<option value='0'>--Select Menu--</option>";
											while ($rowLv1 = mysql_fetch_array($resultLv1)) {
												echo "<option value='" . $rowLv1['ID'] . "'>" . $rowLv1['NAME'] . "</option>";
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
						</div> <!-- end half-size-column -->
						<div class="half-size-column fr">
						<fieldset>
              <p class="form-error-input">
            		<p><label for="tag">Tag</label></p>
								<input type="text" id="text" name="tags" value=""/>
								<br/>
              </p>
              <p class="form-error-input">
                <label for="uploadfile">Upload Image</label>
                <input type="file" name="imageUpload"/>
        		  </p>
              <p class="form-error-input">
                <label for="uploadfile">Upload File</label>
                <input type="file" name="pdfUpload"/>
          	  </p>
          	  <br/>
						  <input type="submit" value="Save" class="round blue ic-right-arrow" />
						</fieldset>
					</div> <!-- end half-size-column -->
				</div> <!-- end content-module-main -->
			</form>
			<script>
			
			</script>
		</div> <!-- end content-module -->
	</div> <!-- end full-width -->
</div> <!-- end content -->
<?php include("include/footer.php");?>