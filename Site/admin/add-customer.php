<<<<<<< HEAD
<!DOCTYPE html>
<?php include("include/header.php");?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CMS Mckansys</title>	
	<!-- Stylesheets -->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/reset.css" rel="stylesheet" type="text/css">

	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/script.js"></script>  

	
</head>
<body>

	<!-- TOP BAR -->
	<div id="header">
		
		<div class="page-full-width cf">
			
            <ul id="nav" class="left">
    			<li class="v-sep"><a href="#" class="round button green ic-left-arrow image-left">Go to website</a></li>
                <li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>admin</strong></a>
                    <ul>
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">User Settings</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Log out</a></li>
                    </ul> 
                </li>
            
                <li><a href="#" class="round button dark menu-logoff image-left">Log out</a></li>
                
            </ul> <!-- end nav -->
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
=======
<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
<?php include("include/checksession.php");?>	
>>>>>>> 7572bc34b8d13ae4cc3d39ef2dbbb293f4da6c43
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php" class="active-tab">Customer Management</a></li>
				<li><a href="pdf.php">PDF Management</a></li>
                <li><a href="tag.php">Tag Management</a></li>
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
					
						<h3 class="fl">Add customer</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form action="add-customer-proc.php" method="post">
							
								<fieldset>
                                     <p class="form-error-input">
                                    	
                                    	<label for="picture">Profile Picture</label>
                                        
                                        <input type="file" />
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
										<p class="seperator">Address</p>
										<textarea style="resize: none; width: 318px; height: 100px;" id="address" name="address" class="round full-width-textarea"></textarea>
									</p>
									
									<p>
										<p class="seperator">City</p>
										<input type="text" id="city" name="city"/>
									</p>
									
									<p>
										<p class="seperator">Zip</p>
										<input type="text" id="zip" name="zip"/>
									</p>
									
									<!-- country -->
									<p class="seperator">Country</p>
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
										<p class="seperator">Phone</p>
										<input type="text" id="phone" name="phone"/>
									</p>
									
									<p>
										<p class="seperator">Fax</p>
										<input type="text" id="fax" name="fax"/>
									</p>
									
                                    <input type="submit" value="Submit" class="round blue ic-right-arrow" />
									
								</fieldset>
						</form>
						
						</div> <!-- end half-size-column -->

					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2013 <a href="#">MCKANSYS</a>. All rights reserved.</p>
		
	</div> <!-- end footer -->

</body>
</html>