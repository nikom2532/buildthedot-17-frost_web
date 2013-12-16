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
include("include/top-bar.php");?>
<?php include("include/checksession.php");?>		
<?php include("my-profile-proc.php");?>		
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php">Customer Management</a></li>
				<li><a href="pdf.php">PDF Management</a></li>
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
					
						<h3 class="fl">My profile</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl" id="my-profile">
						
							<form action="edit-my-profile.php" method="POST" name="editprofile" id="editprofile">
								
							<?php
								while($fetchArray=mysql_fetch_array($cmdQueryMyprofile)){
								?>

								<fieldset>
                  				
									<p>
										<h3>USERNAME<span id="username"><?=$fetchArray['NAME'] ?></span></h3>
										
									</p>
									
									<p>
										<h3>PASSWORD<span id="email"><?=$fetchArray['EMAIL'] ?></span></h3>
										
									</p>
	
                                    <a href="edit-my-profile.php" class="button round blue image-right ic-edit text-upper">Edit profile</a>
									
								</fieldset>
							<?php }?>
						</form>
						
						</div> <!-- end half-size-column -->

					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

	
<?php include("include/footer.php");?>