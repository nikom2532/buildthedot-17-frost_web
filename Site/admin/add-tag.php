<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
<?php include("include/checksession.php");?>	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php">Customer Management</a></li>
				<li><a href="pdf.php">PDF Management</a></li>
                <li><a href="tag.php" class="active-tab">Tag Management</a></li>
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
					
						<h3 class="fl">Add tag</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form method='POST' action='add-tag-proc.php' id='addtag' name='addtag'>
							
								<fieldset>
								
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName1" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName2" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName3" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName4" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName5" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName6" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName7" class="round default-width-input" />
									</p>
									 
                                     <input type="submit" value="Submit" class="round blue ic-right-arrow" />
				
                           		</fieldset>
							
							</form>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>