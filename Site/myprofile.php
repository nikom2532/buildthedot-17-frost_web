<?php
include ("include/header.php");
include ("myprofile-proc.php");
?>
<?php
if ($_SESSION["userid"] == "") {
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
} else {
	include ("include/top-menu.php");
?>
<div id="content">
	<div class="container_12" id="container">
		<div id="content-middle" class="grid_12">
			<div id="profile" >
				<h1 id="head-title" class="text-green grid_12">My Profile</h1>

				<div class="grid_8" id="profile-detail">
					<?php while($fetchArray=mysql_fetch_array($cmdQueryMyprofile)){
					?>

					<div class="seperator">
						<img src="images/user_images/<?=$fetchArray['PHOTO_NAME'] ?>"  alt="profile">
					</div>

					<p class="seperator">
						Name
					</p>
					<p>
						<?=$fetchArray['FIRSTNAME'] ?><span class="indent">
						<?php
							if ($fetchArray['LASTNAME'] != "") {
								echo $fetchArray['LASTNAME'];
							} else {
								echo "-";
							}
						?></span>
					</p>
					<p class="seperator">
						Email
					</p>
					<p>
						<?php
							if ($fetchArray['EMAIL'] != "") {
								echo $fetchArray['EMAIL'];
								
							} else {
								echo "-";
								
							}
						?></p>
					<p class="seperator">
						Company
					</p>
					<p>
						<?php
							if($fetchArray['COMPANY'] != ""){
								echo $fetchArray['COMPANY'];
							}else {
								echo "-";
							}
						 ?></p>
					<p class="seperator">
						Job title
					</p>
					<p>
						<?php
							if($fetchArray['JOB_TITLE'] != ""){
								echo $fetchArray['JOB_TITLE'];
							}else{
								echo "-";
							}
						?></p>
					<p class="seperator">
						Department
					</p>
					<?php
					$departmentID = $fetchArray['DEPARTMENT_ID'];
					$sqlDepartment = "SELECT * FROM DEPARTMENT WHERE ID = '$departmentID'";
					$resultDepartment = mysql_query($sqlDepartment);
					echo "<p>";
					while ($rowDepartment = mysql_fetch_array($resultDepartment)) {
						if($rowDepartment['NAME'] != ""){
							echo $rowDepartment['NAME'];
						} else {
							echo "-";
						}
					}
					echo "</p>";
					?>
					<p class="seperator">
						Industry
					</p>
					<?php
					$industryID = $fetchArray['INDUSTRY_ID'];
					$sqlIndustry = "SELECT * FROM INDUSTRY WHERE ID = '$industryID'";
					$resultIndustry = mysql_query($sqlIndustry);
					echo "<p>";
					while ($rowIndustry = mysql_fetch_array($resultIndustry)) {
						if ($rowIndustry['NAME'] != ""){
							echo $rowIndustry['NAME'];
						} else {
							echo "-";
						}
					}
					echo "</p>";
					?>
					<!-- <p>Technology</p>
					<p><?=$fetchArray['TECHNOLOGY_ID'] ?></p><br> -->
					<!-- <p>Company Size</p>
					<p><?=$fetchArray['COMPANY'] ?></p><br> -->
					<p class="seperator">
						Address
					</p>
					<p>
						<?php
							if($fetchArray['ADDRESS'] != ""){
								echo $fetchArray['ADDRESS'];
							}else{
								echo "-";
							}
						 ?></p>
					<p class="seperator">
						City
					</p>
					<p>
						<?php
						if($fetchArray['CITY'] != ""){
							echo $fetchArray['CITY'];
						}else{
							echo "-";
							
						}
						 ?></p>
					<p class="seperator">
						Zip
					</p>
					<p>
						<?php
						if($fetchArray['ZIP'] != ""){
							echo $fetchArray['ZIP'];
							
						}else {
							echo "-";
							
						} ?></p>
					<p  class="seperator">
						Country
					</p>
					<?php
					$countryID = $fetchArray['COUNTRY_ID'];
					$sqlCountry = "SELECT * FROM COUNTRY WHERE ID = '$countryID'";
					$resultCountry = mysql_query($sqlCountry);
					echo "<p>";
					while ($rowCountry = mysql_fetch_array($resultCountry)) {
						if ($rowCountry['NAME'] != ""){
							echo $rowCountry['NAME'];
						} else{
							echo "-";
						} 
					}
					echo "</p>";
					?>
					<p class="seperator">
						Phone
					</p>
					<p>
						<?php
						if($fetchArray['PHONE'] != ""){
							echo $fetchArray['PHONE'];
						}else{
							echo "-";
						} ?></p>
					<p class="seperator">
						Fax
					</p>
					<p>
						<?php
						if($fetchArray['FAX'] != ""){
							echo $fetchArray['FAX'];
						}else {
							echo "-";
						} ?></p>
						<?php } ?>
				</div>
				<br class="clear"/>
				<div class="grid_3">
					<a href="edit-profile.php?userID=<?=$userID ?>" class="button orange ic-edit image-right">Edit profile</a>
				</div>
			</div><!--end profile -->
			<br class="clear"/>
			<div id="billing-account" class="grid_12">
				<h1 id="head-title" class="text-green" class="grid_12">Billing account</h1>

				<div class="grid_8" id="profile-title">
					<p class="seperator">
						Name
					</p>
					<p>
						-
					</p><!--name -->
					<p class="seperator">
						Company
					</p>
					<p>
						-
					</p><!--Company -->
					<p class="seperator">
						Email
					</p>
					<p>
						-
					</p><!--Email -->
				</div>
				<br class="clear"/>
				<div class="grid_3">
					<a href="#" class="button orange ic-edit image-right">Billing Account</a>
				</div>
			</div>
		</div><!--end content-middle -->

		<br class="clear"/>

	</div><!--end container_12 -->
</div><!--end content -->
<?php
include ("include/footer.php");
}
?>
