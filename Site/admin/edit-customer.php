<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
	
	
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
					
						<h3 class="fl">Edit customer</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form action="#">
							
								<fieldset>
                                    <p class="form-error-input">
                                        <label for="picture">Profile Picture</label>
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
                                    <input type="submit" value="Save change" class="round blue ic-right-arrow" />
									
								</fieldset>

						
						</div> <!-- end half-size-column -->
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>