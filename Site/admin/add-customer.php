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
include ("include/top-bar.php");
?>
<?php
include ("include/checksession.php");
?>
<script type="text/javascript">
    function GetRandom()
    {
        var pass = document.getElementById("password")
        var chars = "ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	    var string_length = 8;
	    var randomstring = '';
	    var charCount = 0;
	    var numCount = 0;
	
	    for (var i=0; i<string_length; i++) {
	        // If random bit is 0, there are less than 3 digits already saved, and there are not already 5 characters saved, generate a numeric value. 
	        if((Math.floor(Math.random() * 2) == 0) && numCount < 3 || charCount >= 5) {
	            var rnum = Math.floor(Math.random() * 10);
	            randomstring += rnum;
	            numCount += 1;
	        } else {
	            // If any of the above criteria fail, go ahead and generate an alpha character from the chars string
	            var rnum = Math.floor(Math.random() * chars.length);
	            randomstring += chars.substring(rnum,rnum+1);
	            charCount += 1;
	        }
	    }
        pass.value = randomstring;
    }
</script>
<?php
$header_with_tag = "customer";
include("include/header-with-tabs.php");
?>
<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">

		<div class="content-module">

			<div class="content-module-heading cf">

				<h3 class="fl">Add customer</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main cf">

				<div class="half-size-column fl">

					<form action="add-customer-proc.php" method="post" enctype="multipart/form-data">

						<fieldset>
							<p class="form-error-input">

								<label for="picture">Profile Picture</label>

								<input type="file" name="imageUpload" />
							<p>

							<p>
								<label for="name">Name</label>
								<input type="text" name= "firstname" id="firstname" class="round full-width-input"/>
							</p>

							<p>
								<label for="name">Lastname</label>
								<input type="text" id="lastname" name="lastname" class="round full-width-input"/>
							</p>

							<p>
								<label for="email">Email</label>
								<input type="text" id="email" name="email" class="round full-width-input"/>
							</p>

							<p>
								<label for="company">Company</label>
								<input type="text" id="company" name="company" class="round full-width-input"/>
							</p>

							<p>
								<label for="jobtitle">Job title</label>
								<input type="text" id="jobTitle" name="jobTitle" class="round full-width-input"/>
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

										echo "<option value='" . $rowDepartment['ID'] . "'>" . $rowDepartment['NAME'] . "</option>";
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
										echo "<option value='" . $rowIndustry['ID'] . "'>" . $rowIndustry['NAME'] . "</option>";

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
								<textarea style="resize: none; width: 400px; height: 100px;" id="address" name="address" class="round full-width-textarea"></textarea>																					
							</p>
									
 							<p>
								<p class="seperator">
									City
								</p>
								<input type="text" id="city" name="city" class="round full-width-input"/>
							</p>

							<p>
								<p class="seperator">
									Zip
								</p>
								<input type="text" id="zip" name="zip" class="round full-width-input"/>
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
								echo "<option value='" . $rowCountry['ID'] . "'>" . $rowCountry['NAME'] . "</option>";
							}
							echo "</select>";
							echo "</p>";
							?>

							<p>
							<p class="seperator">
								Phone
							</p>
							<input type="text" id="phone" name="phone" class="round full-width-input"/>
							</p>

							<p>
							<p class="seperator">
								Fax
							</p>
							<input type="text" id="fax" name="fax" class="round full-width-input"/>
							</p>
							
							<p>
								<p class="seperator">
									Password
								</p>
								<input type="text" id="password" name="password" class="round full-width-input"/>
								<button OnClick="GetRandom()" type="button">generate</button>
								<span></span>
							</p>
							
							
							<input type="submit" value="Submit" class="round blue ic-right-arrow" />

						</fieldset>
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

<!-- FOOTER -->
<div id="footer">

	<p>
		&copy; Copyright 2013 <a href="#">MCKANSYS</a>. All rights reserved.
	</p>

</div>
<!-- end footer -->

</body>
</html>