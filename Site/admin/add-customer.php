<!DOCTYPE html>

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
						
							<form action="#">
							
								<fieldset>
                                    <p class="form-error-input">
                                        <label for="picture">Picture</label>
                                        <input type="file" />
                                	<p>
								
									<p>
										<label for="name">Name</label>
										<input type="text" id="name" class="round full-width-input" />
									</p>
									
									<p>
										<label for="email">Email</label>
										<input type="text" id="email" class="round full-width-input" />
									</p>
	
									<p>
										<label for="company">Company</label>
										<input type="text" id="company" class="round full-width-input" />
									</p>
	
									<p>
										<label for="jobtitle">Job title</label>
										<input type="text" id="jobtitle" class="round full-width-input" />
									</p>
                                    <p>
										<label for="jobtitle">Job title</label>
										<input type="text" id="jobtitle" class="round full-width-input" />
									</p>
                                    <p class="form-error-input">
										<label for="department">Department</label>
	
										<select id="department">
											<option value="test1">test1</option>
                                            <option value="test2">test2</option>
                                            <option value="test3">test3</option>
										</select>
									</p>
                                    <p class="form-error-input">
										<label for="industry">Industry</label>
	
										<select id="industry">
											<option value="test1">test1</option>
                                            <option value="test2">test2</option>
                                            <option value="test3">test3</option>
										</select>
									</p>
                                    <p class="form-error-input">
										<label for="technology">Technology</label>
	
										<select id="technology">
											<option value="test1">test1</option>
                                            <option value="test2">test2</option>
                                            <option value="test3">test3</option>
										</select>
									</p>
                                     <p class="form-error-input">
										<label for="company size">Company Size</label>
	
										<select id="technology">
											<option value="test1">test1</option>
                                            <option value="test2">test2</option>
                                            <option value="test3">test3</option>
										</select>
									</p>
                                    <p>
										<label for="address">Address</label>
										<textarea id="textarea" class="round full-width-textarea"></textarea>
									</p>
                                    <p class="form-error-input">
										<label for="state">State</label>
	
										<select id="state">
											<option value="test1">test1</option>
                                            <option value="test2">test2</option>
                                            <option value="test3">test3</option>
										</select>
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