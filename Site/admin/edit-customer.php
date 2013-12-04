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
?>
<?php
	include ("include/top-bar.php");
?>
<?php
	include ("include/checksession.php");
?>

<!-- HEADER -->
<div id="header-with-tabs">

	<div class="page-full-width cf">

		<ul id="tabs" class="left">
			<li>
				<a href="main.php" class="dashboard-tab">Dashboard</a>
			</li>
			<li>
				<a href="customer.php" class="active-tab">Customer Management</a>
			</li>
			<li>
				<a href="pdf.php">PDF Management</a>
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

				<h3 class="fl">Edit customer</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main cf">

				<div class="half-size-column fl">

					<form action="edit-customer-update.php" method="POST" enctype="multipart/form-data">

						<fieldset>

							<?php
							$userId = $_POST['userId'];
							$result = mysql_query("
							SELECT a.FIRSTNAME AS firstname,
							a.ID AS userId,
							a.LASTNAME AS lastname,
							a.COMPANY AS company,
							a.EMAIL AS email,
							a.ADDRESS AS address,
							a.CITY AS city,
							a.ZIP AS zip,
							a.COUNTRY_ID AS country,
							a.PHONE AS phone,
							a.FAX AS fax,
							a.JOB_TITLE AS jobTitle,
							a.DEPARTMENT_ID AS deptId,
							a.PHOTO_NAME AS photo,
							a.IS_ACTIVE AS userActive

							FROM USER_PROFILE AS a
							WHERE a.ID = $userId");

							while ($row = mysql_fetch_array($result)) {

							?>
							<p class="form-error-input">

								<label for="picture">Profile Picture</label>
								<div class="seperator">
									<?php
if($row['photo'] != ""){
									?><img src="../images/user_images/<?=$row['photo'] ?>"  alt="profile">
									<?php } ?>
								</div>

								<input type="file" name="imagefile" />
							<p>

							<p>
								<label for="name">Name</label>
								<input type="text" name= "firstname" id="firstname" class="round full-width-input" value="<?=$row['firstname'] ?>"/>
							</p>

							<p>
								<label for="name">Lastname</label>
								<input type="text" id="lastname" name="lastname" class="round full-width-input" value="<?=$row['lastname'] ?>"/>
							</p>

							<p>
								<label for="email">Email</label>
								<input type="text" id="email" name="email" class="round full-width-input" value="<?=$row['email'] ?>"/>
							</p>

							<p>
								<label for="company">Company</label>
								<input type="text" id="company" name="company" class="round full-width-input" value="<?=$row['company'] ?>"/>
							</p>

							<p>
								<label for="jobtitle">Job title</label>
								<input type="text" id="jobTitle" name="jobTitle" class="round full-width-input" value="<?=$row['jobTitle'] ?>"/>
							</p>

							<p class="form-error-input">
								<label for="department">Department</label>

								<?php
								$sqlDepartment = "SELECT * FROM DEPARTMENT";
								$resultDepartment = mysql_query($sqlDepartment);
								?>
								<select id="department_id" name="department_id">
									<?php
									while ($rowDepartment = mysql_fetch_array($resultDepartment)) {
										if ($row['deptId'] == $rowDepartment['ID']) {
											echo "<option value='" . $rowDepartment['ID'] . "' selected>" . $rowDepartment['NAME'] . "</option>";
										} else {
											echo "<option value='" . $rowDepartment['ID'] . "'>" . $rowDepartment['NAME'] . "</option>";
										}
									}
									?>
								</select>
							</p>
							<p class="form-error-input">
								<label for="industry">Industry</label>

								<?php
								$sqlIndustry = "SELECT * FROM INDUSTRY";
								$resultIndustry = mysql_query($sqlIndustry);
								?>
								<select id="industry_id" name="industry_id">
									<?php
									while ($rowIndustry = mysql_fetch_array($resultIndustry)) {
										if ($row['INDUSTRY_ID'] == $rowCountry['ID']) {
											echo "<option value='" . $rowIndustry['ID'] . "' selected>" . $rowIndustry['NAME'] . "</option>";
										} else {
											echo "<option value='" . $rowIndustry['ID'] . "'>" . $rowIndustry['NAME'] . "</option>";
										}
									}
									?>
								</select>
							</p>

							<!-- <p class="form-error-input">
							<label for="technology">Technology</label>

							<select id="technology">
							<option value="test1">test1</option>
							<option value="test2">test2</option>
							<option value="test3">test3</option>
							</select>
							</p> -->
							<!-- <p class="form-error-input">
							<label for="company size">Company Size</label>

							<select id="technology">
							<option value="test1">test1</option>
							<option value="test2">test2</option>
							<option value="test3">test3</option>
							</select>
							</p> -->

							<p>
								<p class="seperator">
									Address
								</p>
								<textarea style="resize: none; width: 318px; height: 100px;" id="address" name="address" class="round full-width-textarea"><?=$row['address'] ?></textarea>							
							</p>
							
							<p>
								<p class="seperator">
									City
								</p>
								<input type="text" id="city" name="city" value="<?=$row['city'] ?>" />
							</p>

							<p>
								<p class="seperator">
									Zip
								</p>
								<input type="text" id="zip" name="zip" value="<?=$row['zip'] ?>" />
							</p>

							<!-- country -->
							<p class="seperator">
								Country
							</p>
							<?php
							$sqlCountry = "SELECT * FROM COUNTRY";
							$resultCountry = mysql_query($sqlCountry);
							echo "<p>";
							echo "<select name='country'>";
							while ($rowCountry = mysql_fetch_array($resultCountry)) {
								if ($row['country'] == $rowCountry['ID']) {
									echo "<option value='" . $rowCountry['ID'] . "' selected>" . $rowCountry['NAME'] . "</option>";
								} else {
									echo "<option value='" . $rowCountry['ID'] . "'>" . $rowCountry['NAME'] . "</option>";
								}
							}
							echo "</select>";
							echo "</p>";
							?>

							<p>
							<p class="seperator">
								Phone
							</p>
							<input type="text" id="phone" name="phone" value="<?=$row['phone'] ?>" />
							</p>

							<p>
								<p class="seperator">
									Fax
								</p>
								<input type="text" id="fax" name="fax" value="<?=$row['fax'] ?>" />
							</p>
							<?php } ?>

						</fieldset>

						<input type="hidden" name="userId" id="userId" value="<?=$userId ?>">
						<input type="submit" value="Save change" class="round blue ic-right-arrow" />
					</form>

				</div>
				<!-- end half-size-column -->

			</div>
			<!-- end content-module-main -->

		</div>
		<!-- end content-module -->

	</div>
	<!-- end full-width -->

</div>
<!-- end content -->

<?php
	include ("include/footer.php");
?>