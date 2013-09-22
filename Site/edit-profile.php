<?php
include ("include/header.php");
include ("myprofile-proc.php");
if ($_SESSION["userid"] == "") {
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
} else {
	include ("include/top-menu.php");
}

?>
<div id="content">
	<div class="container_12" id="container">
		<div id="content-middle" class="grid_12">
			<div id="profile" >
				<h1 id="head-title" class="text-green grid_12">Edit profile</h1>
				
				<form action="edit-profile-update.php" name="editprofile-form" id="editprofile-form" method="POST">
					
					<div class="grid_8" id="profile-detail">
						<fieldset>
							<?php while($fetchArray=mysql_fetch_array($cmdQueryMyprofile)){?>
							
							<div>
								<!-- <img src="images/user_images/<?=$fetchArray['PHOTO_NAME'] ?>"  alt="profile" class="seperator">
								<p class="seperator"><input type="file" name="file" id="file"></p> -->
								<h5>Change Image</h5>
								<input name="imagefile" type="file" />
							</div>
							<p>
								<p class="seperator">Name</p>
								<input type="text" id="firstname" name="firstname" value="<?=$fetchArray['FIRSTNAME'] ?>" />
								<span class="indent"></span>
								<input type="text" id="lastname" name="lastname"  value="<?=$fetchArray['LASTNAME'] ?>" />
								</span>
							</p>
							<p>
								<p class="seperator">Email</p>
								<input type="text" id="email" name="email" value="<?=$fetchArray['EMAIL'] ?>" />
							</p>
							<p>
								<p class="seperator">Company</p>
								<input type="text" id="company" name="company" value="<?=$fetchArray['COMPANY'] ?>" />
							</p>
							<p>
								<p class="seperator">Job title</p>
								<input type="text" id="jobTitle" name="jobTitle" value="<?=$fetchArray['JOB_TITLE'] ?>" />
							</p>
							
							<!-- department -->
							<p class="seperator">Department</p>
							<?php
							$sqlDepartment = "SELECT * FROM DEPARTMENT";
							$resultDepartment = mysql_query($sqlDepartment);
							echo "<p>";
							echo "<select name='department'>";
							while ($rowDepartment = mysql_fetch_array($resultDepartment)) {
								if ($fetchArray['DEPARTMENT_ID']==$rowDepartment['ID']) {
									echo "<option value='" . $rowDepartment['ID'] . "' selected>" . $rowDepartment['NAME'] . "</option>";
								} else {
									echo "<option value='" . $rowDepartment['ID'] . "'>" . $rowDepartment['NAME'] . "</option>";
								}
							}
							echo "</select>";
							echo "</p>";
							?>
							
							<!-- industry -->
							<p class="seperator">Industry</p>
							<?php
							$sqlIndustry = "SELECT * FROM INDUSTRY";
							$resultIndustry = mysql_query($sqlIndustry);
							echo "<p>";
							echo "<select name='industry'>";
							while ($rowIndustry = mysql_fetch_array($resultIndustry)) {
								if ($fetchArray['INDUSTRY_ID']==$rowCountry['ID']) {
									echo "<option value='" . $rowIndustry['ID'] . "' selected>" . $rowIndustry['NAME'] . "</option>";
								} else {
									echo "<option value='" . $rowIndustry['ID'] . "'>" . $rowIndustry['NAME'] . "</option>";
								}
							}
							echo "</select>";
							echo "</p>";
							?>
							
							<!-- <p>
								<select id="technology">
									<option value="test1">test1</option>
									<option value="test2">test2</option>
									<option value="test3">test3</option>
								</select>
							</p> -->
							
							<!-- company size -->
							 <?php
							// $sqlCountry = "SELECT * FROM COUNTRY";
							// $resultCountry = mysql_query($sqlCountry);
							// echo "<p>";
							// echo "<select name='country'>";
							// while ($rowCountry = mysql_fetch_array($resultCountry)) {
								// if ($fetchArray['COUNTRY_ID']==$rowCountry['ID']) {
									// echo "<option value='" . $rowCountry['ID'] . "' selected>" . $rowCountry['NAME'] . "</option>";
								// } else {
									// echo "<option value='" . $rowCountry['ID'] . "'>" . $rowCountry['NAME'] . "</option>";
								// }
							// }
							// echo "</select>";
							// echo "</p>";
							 ?>
							
							<p>
								<p class="seperator">Address</p>
								<textarea style="resize: none; width: 318px; height: 100px;" id="address" name="address" class="round full-width-textarea"><?=$fetchArray['ADDRESS'] ?></textarea>
							</p>
							
							<p>
								<p class="seperator">City</p>
								<input type="text" id="city" name="city" value="<?=$fetchArray['CITY'] ?>" />
							</p>
							
							<p>
								<p class="seperator">Zip</p>
								<input type="text" id="zip" name="zip" value="<?=$fetchArray['ZIP'] ?>" />
							</p>
							
							<!-- country -->
							<p class="seperator">Country</p>
							<?php
							$sqlCountry = "SELECT * FROM COUNTRY";
							$resultCountry = mysql_query($sqlCountry);
							echo "<p>";
							echo "<select name='country'>";
							while ($rowCountry = mysql_fetch_array($resultCountry)) {
								if ($fetchArray['COUNTRY_ID']==$rowCountry['ID']) {
									echo "<option value='" . $rowCountry['ID'] . "' selected>" . $rowCountry['NAME'] . "</option>";
								} else {
									echo "<option value='" . $rowCountry['ID'] . "'>" . $rowCountry['NAME'] . "</option>";
								}
							}
							echo "</select>";
							echo "</p>";
							?>
							
							<p>
								<p class="seperator">Phone</p>
								<input type="text" id="phone" name="phone" value="<?=$fetchArray['PHONE'] ?>" />
							</p>
							
							<p>
								<p class="seperator">Fax</p>
								<input type="text" id="fax" name="fax" value="<?=$fetchArray['FAX'] ?>" />
							</p>
							<?php } ?>
						</fieldset>
						<p id="edit-password">
							<a href="edit-password.php?userID=<?=$userID ?>" >edit password</a>
						</p>
					</div>
					<br class="clear"/>
					<div class="grid_2 prefix_4">
						<input name="userID" type="hidden" value="<?=$userID ?>" />
						<input type="submit" value="Save change" class="button orange image-right ic-right-arrow"/>
					</div>
				</form>
				<br class="clear"/>
				<div class="grid_3">

				</div>
			</div><!--end profile -->

		</div><!--end content-middle -->

		<br class="clear"/>

	</div><!--end container_12 -->
</div><!--end content -->
<?php
include ("include/footer.php");
?>
